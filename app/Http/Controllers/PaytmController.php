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
        $response = $request->validate([
            "name" => 'required|string',
            "email" => 'required|email',
            "phone" => 'required',
            "subscription" => 'required|string',
        ]);

        $amount = Plans::where('id', $request->subscription)->first();
        if (empty($amount)) {
            return back()->with('error', 'Something Wrong');
        }
        $order = 'SchoolApp' . rand(111111, 999999) . '@' . $request->subscription . date('d');
        $response['ORDERID'] = $order;
        $data = [
            'MID' => env('MID'),
            'ORDER_ID' => $order,
            'CUST_ID' => "CUST" . rand(10000, 99999999),
            'INDUSTRY_TYPE_ID' => env('INDUSTRY_TYPE_ID'),
            'CHANNEL_ID' => env('CHANNEL_ID'),
            'TXN_AMOUNT' => $amount->amount,
            'CALLBACK_URL' => route('status'),
            'WEBSITE' => env('WEBSITE'),
            'MSISDN' => $request->phone,
            'EMAIL' => $request->email,
            'VERIFIED_BY' => $request->email,
            'IS_USER_VERIFIED' => 'YES',
        ];
        $data['CHECKSUMHASH'] = getChecksumFromArray($data, env('MK'));

        orderHistory::create($response);
        $this->payment($data);
    }

    public function status(Request $request)
    {
        $checkData = orderHistory::where('ORDERID', $request->ORDERID)->first();
        $data = $checkData->toArray();
        $response = [
            "name"       => $checkData->name,
            "EMAIL"      => $checkData->email,
            "ORDERID"    => $request->ORDERID,
            "TXNID"      => $request->TXNID,
            "TXNAMOUNT"  => $request->TXNAMOUNT,
            "PAYMENTMODE" => $request->PAYMENTMODE,
            "TXNDATE"    => $request->TXNDATE,
            "STATUS"     => $request->STATUS,
            "RESPCODE"   => $request->RESPCODE,
            "BANKNAME"   => $request->BANKNAME,
            "RESPMSG"    => $request->RESPMSG,
            "_token"     => csrf_token(),
        ];
        if ($request->RESPCODE == '01') {
            Mail::to($checkData->email)->send(new OrderPlaceMail($response));
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, env('API_BACKEND'));
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($response));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            dd($server_output);
            curl_close($ch);
        }
        return view('order', compact('response'));
    }

    public function payment($data)
    {
        $d = '<!DOCTYPE html><html><head><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><style>*{margin:0;padding:0;box-sizing:border-box}body,html{margin:0;padding:0;height:100%;font-family:sans-serif}.loader-wrapper{height:100%;width:100%;padding-bottom:20px;position:absolute}.loader-box{position:absolute;text-align:center;background:#fff;min-width:200px;left:0;right:0;top:0;bottom:0;margin:auto;height:150px}.loader-box h3{font-size:24px;color:#000;margin:15px 0 12px 0}.loader-box img{max-width:80px}.loader-box p{font-size:17px;color:#666;line-height:24px;margin:0 auto;padding:0 15%}.spinner{width:70px;text-align:center;display:none}.spinner>div{width:10px;height:10px;background:#012b71;border-radius:100%;display:inline-block;-webkit-animation:sk-bouncedelay 1s infinite ease-in-out both;-ms-animation:sk-bouncedelay 1s infinite ease-in-out both;-moz-animation:sk-bouncedelay 1s infinite ease-in-out both;-o-animation:sk-bouncedelay 1s infinite ease-in-out both;animation:sk-bouncedelay 1s infinite ease-in-out both}.spinner .bounce1{-webkit-animation-delay:-.64s;animation-delay:-.64s}.spinner .bounce2{-webkit-animation-delay:-.48s;animation-delay:-.48s}.spinner .bounce3{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce4{-webkit-animation-delay:-.16s;animation-delay:-.16s;background:#48baf5}.spinner .bounce5{background:#48baf5}@-ms-keyframes sk-bouncedelay{0%,100%,80%{-ms-transform:scale(.2)}40%{-ms-transform:scale(1)}}@-o-keyframes sk-bouncedelay{0%,100%,80%{-o-transform:scale(.2)}40%{-o-transform:scale(1)}}@-moz-keyframes sk-bouncedelay{0%,100%,80%{-moz-transform:scale(.2)}40%{-moz-transform:scale(1)}}@-webkit-keyframes sk-bouncedelay{0%,100%,80%{-webkit-transform:scale(.2)}40%{-webkit-transform:scale(1)}}@keyframes sk-bouncedelay{0%,100%,80%{-webkit-transform:scale(.2);transform:scale(.2)}40%{-webkit-transform:scale(1);transform:scale(1)}}@media all and (max-width:900px){.spinner{display:inline-block}.loader-img{display:none}}</style></head><body>';
        $d .= '<form action="' . PAYTM_TXN_URL . '" method="POST">';
        foreach ($data as $key => $value) {
            $d .= "<input hidden type='text' name=" . $key . " id=" . $key . " value=" . $value . ">";
        }
        $d .= '</form><div class=' . "loader-wrapper" . '><div class=' . "loader-box" . '><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div><div class="bounce4"></div><div class="bounce5"></div></div><img class="loader-img" src="https://staticgw1.paytm.in/common/images/loader.gif" alt="Loading..." /><h3>Processing</h3><p>Please do not press ' . "Back" . ' or ' . "Refresh" . ' button</p></div></div>';
        $d .= '<script type="text/javascript">document.forms[0].submit();</script></body></html>';
        echo $d;
    }
}
