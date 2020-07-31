<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
   public function index()
   {
       $inquiry = Contact::orderBy('id','DESC')->get();
       return view('admin.inquiries',compact('inquiry'));
   }
}
