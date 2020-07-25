<?php

namespace App\Http\Controllers\Admin;

use App\Admin\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::orderBy('id', 'DESC')->first();
        return view('admin.pages.about', compact('about'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        About::create($this->validateRequest($request));
        return back()->with('success', 'Inserted Successfully.');
    }

    public function validateRequest($request)
    {
        return $request->validate([
            'shortdescription' => 'required|min:50',
            'slogan' => 'required|min:10',
            'longdescription' => 'required|min:100',
        ]);
    }
}
