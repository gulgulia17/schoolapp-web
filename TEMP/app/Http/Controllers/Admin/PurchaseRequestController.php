<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PurchaseRequest;
use Illuminate\Http\Request;

class PurchaseRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchaserequest = PurchaseRequest::orderBy('id','DESC')->get();
        return view('admin.purchaserequest',compact('purchaserequest'));
    }
    
}
