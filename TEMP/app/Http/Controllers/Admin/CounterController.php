<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Counter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counter = Counter::orderBy('id', 'DESC')->first();
        return view('admin.counter.index', compact('counter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.counter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Counter::create($this->validateRequest($request));
        return back()->with('success', 'Inserted Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function show(Counter $counter)
    {
        return view('admin.counter.show', compact('counter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function edit(Counter $counter)
    {
        return view('admin.counter.edit', compact('counter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Counter $counter)
    {
        $counter->update($this->validateRequest($request));
        return back()->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Counter $counter)
    {
        $counter->delete();
        return back()->with('success', 'Deleted Successfully.');
    }

    protected function validateRequest($request)
    {
        return $request->validate([
            'active' => 'required|string',
            'updates' => 'required|string',
            'mettings' => 'required|string',
            'facebookfans' => 'required|string',
        ]);
    }
}
