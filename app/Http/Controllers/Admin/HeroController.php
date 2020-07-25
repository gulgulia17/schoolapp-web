<?php

namespace App\Http\Controllers\Admin;

use App\Admin\HeroSection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $herosection = HeroSection::all();
        return view('admin.herosection.index', compact('herosection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.herosection.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->storeImage(HeroSection::create($this->validateRequest($request)));
        return back()->with('success', 'Inserted Successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(HeroSection $herosection)
    {
        return view('admin.herosection.edit', compact('herosection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HeroSection $herosection)
    {
        if ($request->hasFile('image')) {
            $herosection->update($this->validateRequest($request));
            $this->storeImage($herosection);
        } else {
            $herosection->update($request->validate([
                'title' => 'required',
                'description' => 'required|min:50',
            ]));
        }
        return back()->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HeroSection $herosection)
    {
        $herosection->delete();
        return back()->with('success', 'Deleted Successfully.');
    }

    public function validateRequest($request)
    {
        return $request->validate([
            'title' => 'required',
            'description' => 'required|min:50',
            'image' => 'required',
        ]);
    }

    public function storeImage($data)
    {
        $imageName = time() . '.' . $data->image->getClientOriginalExtension();
        $imagePath = "images/herosection/$imageName";
        $data->image->move(public_path_custom('images/herosection'), $imageName);
        $data->image = $imagePath;
        $data->save();
    }
}
