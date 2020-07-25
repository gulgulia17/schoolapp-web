<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\BotMessage;
use Illuminate\Http\Request;

class BotMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $botMessage = BotMessage::all();
        return view('/admin.botmessage.index', compact('botMessage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin.botmessage.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BotMessage::create($request->validate([
            'question' => 'string| required',
            'reply' => 'string| required',
        ]));
        return redirect('botmessage');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\BotMessage  $botMessage
     * @return \Illuminate\Http\Response
     */
    public function show(BotMessage $botMessage)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BotMessage  $botMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(BotMessage $botmessage)
    {
        return view('/admin.botmessage.edit', compact('botmessage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BotMessage  $botMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BotMessage $botmessage)
    {
       $botmessage ->update($request->validate([
            'question' => 'string| required',
            'reply' => 'string| required',
        ]));
        return redirect('botmessage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BotMessage  $botMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(BotMessage $botMessage)
    {
        //
    }
}
