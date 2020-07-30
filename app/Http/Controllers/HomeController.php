<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Message;
use App\orderHistory;
use App\PurchaseRequest;
use App\Admin\Newfeatures;
use App\Admin\Testimonial;
use App\Mail\OrderPlaceMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalinquires = Contact::all()->count();
        $totalpurchaserequest = PurchaseRequest::all()->count();
        $totaltestimonials = Testimonial::all()->count();
        $totalfeatures = Newfeatures::all()->count();
        $totalmessage = Message::all()->count();
        return view('admin.index', compact('totalinquires', 'totalpurchaserequest', 'totaltestimonials', 'totalfeatures', 'totalmessage'));
    }
    public function orderHistory()
    {
        $orderHistory = orderHistory::orderBy('id','desc')->get();
        return view('admin.orderhistory', compact('orderHistory'));
    }

    public function ChangeStatus($id)
    {
        $orderHistory = orderHistory::where('id', $id)->first();
        $orderHistory->statuss = Request()->statuss;
        $orderHistory->save();
        $data = $orderHistory->toArray();
        Mail::to($orderHistory->email)->send(new OrderPlaceMail($data));
        echo $orderHistory;
        // return json_decode($orderHistory);
    }
}
