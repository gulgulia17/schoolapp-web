<?php

namespace App\Http\Controllers;

use App\Paytm;
use App\Admin\Plans;
use App\orderHistory;
use App\Mail\OrderPlaceMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

require_once __DIR__ . '../../../PaytmKit/lib/config_paytm.php';
require_once __DIR__ . '../../../PaytmKit/lib/encdec_paytm.php';

class PaytmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request['_token']);
        $amount = Plans::where('id', $request->subscription)->first();
        if(empty($amount)){
             return back()->with('error', 'Something Wrong');
        }
        $order = 'SchoolApp'.rand(111111, 999999).'@'.$request->subscription.date('d');
        $data = [
            "CUST_ID" => rand(111111, 999999),
            "INDUSTRY_TYPE_ID" => "Retail",
            "CHANNEL_ID" => 'WEB',
            "MID" => PAYTM_MERCHANT_MID,
            "WEBSITE" => PAYTM_MERCHANT_WEBSITE,
            "CALLBACK_URL" => route('status'),
            "MOBILE_NO" =>  $request->phone,
            "EMAIL" =>  $request->email,
        ];
        $data['TXN_AMOUNT'] = $amount->amount;
        $data['ORDER_ID'] = $order;
        $data['CHECKSUMHASH'] = getChecksumFromArray($data, PAYTM_MERCHANT_KEY);
         $response = $request->validate([
            "name" => 'required|string',
            "email" => 'required|email',
            "phone" => 'required',
            "subscription" => 'required|string',
        ]);
        $response['ORDERID'] = $order;
        orderHistory::create($response);
        $this->payment($data);
    }

    public function status(Request $request)
    {
        $checkData = orderHistory::where('ORDERID', $request->ORDERID)->first();
        $data = $checkData->toArray();
        Mail::to($checkData->email)->send(new OrderPlaceMail($data));
        $response = [
            "name"       => $checkData->name,
            "EMAIL"      => $checkData->email,
            "ORDERID"    => $request->ORDERID,
            "TXNID"      => $request->TXNID,
            "TXNAMOUNT"  => $request->TXNAMOUNT,
            "PAYMENTMODE"=> $request->PAYMENTMODE,
            "TXNDATE"    => $request->TXNDATE,
            "STATUS"     => $request->STATUS,
            "RESPCODE"   => $request->RESPCODE,
            "BANKNAME"   => $request->BANKNAME,
            "RESPMSG"    => $request->RESPMSG,
            "_token"     => csrf_token(),
        ];
        // if ($request->RESPCODE == '01') {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,"http://127.0.0.1:8001/api/payment");
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($response));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            curl_close ($ch);

        // }
        return view('order', compact('response'));
    }

    public function payment($data)
    {
        // dd($data);
        $url = PAYTM_TXN_URL;
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) {
            print_r($result);
        }
        echo $result;
        // echo $server_output;
    }
}