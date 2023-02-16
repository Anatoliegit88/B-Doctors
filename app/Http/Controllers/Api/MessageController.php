<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request) 
    {
        $data = $request->all();
        $message = new Message();
        $message->name = $data['name'];
        $message->email = $data['email'];
        $message->text = $data['text'];
        $message->user_id = $data['user_id']; 
        $message->save();
    }
}
