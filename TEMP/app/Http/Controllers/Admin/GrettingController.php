<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Gretting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GrettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gretting = Gretting::orderBy('id', 'DESC')->first();
        return view('admin.pages.gretting', compact('gretting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gretting::create($this->validateRequest($request));
        return back()->with('success', 'Inserted Successfully.');
    }

    public function validateRequest($request)
    {
        return $request->validate([
            'shortdescription' => 'required|min:50',
            'longdescription' => 'required|min:100'
        ]);
    }
}
