<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Messages;

class ChatControl extends Controller
{
    public function fetch_message(){
        return Messages::with('user')->get();
    }

    public function send_message(Request $request){
        $message=Messages::create([
            'user_id'=>Auth::id(),
            'message'=>$request->message
        ]);

        return $message->load('user');
    }

}
