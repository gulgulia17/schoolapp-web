<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Message;
use App\PurchaseRequest;
use App\Admin\Newfeatures;
use App\Admin\Testimonial;
use Illuminate\Http\Request;

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
}
