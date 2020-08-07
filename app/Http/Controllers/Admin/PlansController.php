<?php

namespace App\Http\Controllers\Admin;


use App\Admin\Plans;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plan = Plans::where('status', 1)->get();
        return view('admin.plan.index', compact('plan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Plans::create($this->validateRequest());
        return redirect('plans');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plans  $plans
     * @return \Illuminate\Http\Response
     */
    public function show(Plans $plans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plans  $plans
     * @return \Illuminate\Http\Response
     */
    public function edit(Plans $plan)
    {
        return view('admin.plan.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plans  $plans
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plans $plan)
    {
        $plan->update($this->validateRequest());
        return redirect('plans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plans  $plans
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plans $plans)
    {
        //
    }

    public function validateRequest()
    {
        return Request()->validate([
            'name'      => 'string | Required',
            'desc'      => 'string | Required',
            'features'  => 'string | Required',
            'amount'    => 'string | Required',
        ]);
    }
}
