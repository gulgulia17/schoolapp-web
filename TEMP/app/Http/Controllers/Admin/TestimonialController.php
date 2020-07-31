<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Admin\Testimonial;
use Carbon\Traits\Test;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonial = Testimonial::orderBy('id', 'DESC')->get();
        return view('admin.testimonial.index', compact('testimonial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->storeImage(Testimonial::create($this->validateRequest($request)));
        return back()->with('success', 'Inserted Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonial.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        if ($request->hasFile('logo')) {
            $testimonial->update($this->validateRequest($request));
            $this->storeImage($testimonial);
        } else {
            $testimonial->update($request->validate([
                'name' => 'required|string',
                'work' => 'required|string',
                'testimonial' => 'required|string',
            ]));
        }
        return back()->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return back()->with('success', 'Deleted Successfully.');
    }

    protected function validateRequest($request)
    {
        return $request->validate([
            'name' => 'required|string',
            'work' => 'required|string',
            'logo' => 'required',
            'testimonial' => 'required|string',
        ]);
    }

    public function storeImage($data)
    {
        $imageName = time() . '.' . $data->logo->getClientOriginalExtension();
        $imagePath = "images/testimonial/$imageName";
        $data->logo->move(public_path_custom('images/testimonial'), $imageName);
        $data->logo = $imagePath;
        $data->save();
    }
}
