<?php

namespace App\Http\Controllers;

use App\Message;
use App\BotMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $message = Message::orderBy('id', 'DESC')->get();
        return view('admin.botmessage.message', compact('message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reply =  BotMessage::where('question', $request->message)->first();
        if(!empty($reply)){
            $html=$reply->reply;
        }else{
            $html="Sorry not be able to understand you. Please Whatsapp and Call this 9352529594.";
        }
        $savemessage = new Message();
        $savemessage->message = $request->message;
        $savemessage->botmessage = $html;
        $savemessage->ip = $request->ip;
        $savemessage->save();
        return $html;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
    public function cleartable()
    {
        Message::query()->truncate();
        return true;
    }
}
