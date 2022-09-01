<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $messages = $user->messages;

        return view('user.messages')->with("messages", $messages);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $request->validate([
            'title' => ['required', 'string', 'min:2'],
            'content' => ['required', 'string', 'min:5'],
        ]);

        Message::create([
            'title' => ucfirst(trans($request->title)),
            'content' => ucfirst(trans($request->content)),
            'user_id' => $user_id
        ]);

        return redirect('/messages')->with('message_sent', 'Message successfully sent');
    }
}
