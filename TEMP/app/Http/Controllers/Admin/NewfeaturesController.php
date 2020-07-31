<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Admin\Newfeatures;
use Carbon\Traits\Test;
use Illuminate\Http\Request;

class NewfeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newfeature = Newfeatures::orderBy('id', 'DESC')->get();
        return view('admin.newfeatures.index', compact('newfeature'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.newfeatures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->stoeImage(Newfeatures::create($this->validateRequest($request)));
        return back()->with('success', 'Inserted Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Newfeatures  $newfeature
     * @return \Illuminate\Http\Response
     */
    public function show(Newfeatures $newfeature)
    {
        return view('admin.newfeatures.show', compact('newfeature'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Newfeatures  $newfeature
     * @return \Illuminate\Http\Response
     */
    public function edit(Newfeatures $newfeature)
    {
        return view('admin.newfeatures.edit', compact('newfeature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Newfeatures  $newfeature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newfeatures $newfeature)
    {
        if ($request->hasFile('image')) {
            $newfeature->update($this->validateRequest($request));
            $this->stoeImage($newfeature);
        } else {
            $newfeature->update($request->validate([
                'name' => 'required|string',
                'desc' => 'required|string',
            ]));
        }
        return back()->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Newfeatures  $newfeature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newfeatures $newfeature)
    {
        $newfeature->delete();
        return back()->with('success', 'Deleted Successfully.');
    }

    protected function validateRequest($request)
    {
        return $request->validate([
            'name' => 'required|string',
            'desc' => 'required|string',
            'image' => 'required|mimes:jpeg,png,jpg|max:2500',
        ]);
    }

    protected function stoeImage($data)
    {
        $imageName = time() . '.' . $data->image->getClientOriginalExtension();
        $imagePath = "images/newfeatures/$imageName";
        $data->image->move(public_path_custom('images/newfeatures'), $imageName);
        $data->image = $imagePath;
        $data->save();
    }
}
