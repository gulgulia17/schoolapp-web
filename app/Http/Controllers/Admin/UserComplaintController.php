<?php

namespace App\Http\Controllers\Admin;

use App\Complaint;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserComplaintController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usercomplaints = Complaint::orderBy('id','DESC')->get();
        return view('admin.usercomplaints',compact('usercomplaints'));
    }
}
