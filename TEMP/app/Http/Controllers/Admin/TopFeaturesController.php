<?php

namespace App\Http\Controllers\Admin;

use App\Admin\TopFeatures;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TopFeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topfeature = TopFeatures::orderBy('id', 'DESC')->get();
        return view('admin.topfeatures.index', compact('topfeature'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.topfeatures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->storeImage(TopFeatures::create($this->validateRequest($request)));
        return back()->with('success', 'Inserted Successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\TopFeatures $topfeature
     * @return \Illuminate\Http\Response
     */
    public function edit(TopFeatures $topfeature)
    {
        return view('admin.topfeatures.edit', compact('topfeature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\TopFeatures $topfeature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TopFeatures $topfeature)
    {
        if ($request->hasFile('image')) {
            $topfeature->update($this->validateRequest($request));
            $this->storeImage($topfeature);
        } else {
            $topfeature->update($request->validate([
                'title' => 'required',
                'description' => 'required|max:100',
            ]));
        }
        return back()->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\TopFeatures $topfeature
     * @return \Illuminate\Http\Response
     */
    public function destroy(TopFeatures $topfeature)
    {
        $topfeature->delete();
        return back()->with('success', 'Deleted Successfully.');
    }

    public function validateRequest($request)
    {
        return $request->validate([
            'title' => 'required',
            'description' => 'required|max:100',
            'image' => 'required',
        ]);
    }

    public function storeImage($data)
    {
        $imageName = time() . '.' . $data->image->getClientOriginalExtension();
        $imagePath = "images/topfeatures/$imageName";
        $data->image->move(public_path_custom('images/topfeatures'), $imageName);
        $data->image = $imagePath;
        $data->save();
    }
}
