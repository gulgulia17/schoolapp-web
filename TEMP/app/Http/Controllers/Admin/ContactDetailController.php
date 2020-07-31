<?php

namespace App\Http\Controllers\Admin;

use App\Admin\ContactDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = ContactDetails::orderBy('id', 'DESC')->first();
        return view('admin.pages.contact', compact('contact'));
    }

    public function store(Request $request)
    {
        ContactDetails::create($this->validateRequest($request));
        return back()->with('success', 'Inserted Successfully.');
    }

    public function validateRequest($request)
    {
        return $request->validate([
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'website' => 'required',
        ]);
    }
}
