<?php

namespace App\Http\Controllers\Admin;

use App\Admin\SocialLinks;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sociallinks = SocialLinks::all();
        return view('admin.sociallinks.index', compact('sociallinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sociallinks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SocialLinks::create($this->validateRequest($request));
        return back()->with('success', 'Generated Successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\SocialLinks $sociallink
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialLinks $sociallink)
    {
        return view('admin.sociallinks.edit', compact('sociallink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\SocialLinks $sociallink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocialLinks $sociallink)
    {
        $sociallink->update($this->validateRequest($request));
        return back()->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\SocialLinks $sociallink
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialLinks $sociallink)
    {
        $sociallink->delete();
        return back()->with('success', 'Deleted Successfully.');
    }

    public function validateRequest($request)
    {
        return $request->validate([
            'icon' => 'required',
            'name' => 'required',
            'url' => 'required',
        ]);
    }
}
