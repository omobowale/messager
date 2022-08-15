<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class AdminMessageController extends Controller
{
    public function index(){
        
        $messages = Message::all()->sortByDesc('created_at');
        
        return view('admin.messages')->with("messages", $messages);
    }

}
