<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatControl extends Controller
{
    public function send_message(Request $request){
        $message=Messages::create([
            'user_id'=>Auth::id(),
            'message'=>$request->message
        ]);

        return $message->load('user');
    }

    public function fetch_message(Request $request){
        return Messages::with('user')->get();
    }
}
