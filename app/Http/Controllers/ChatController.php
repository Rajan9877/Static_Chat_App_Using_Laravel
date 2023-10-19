<?php

namespace App\Http\Controllers;

use App\Events\ButtonClicked;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(Request $request){
        $user = $request->input('user');
        $message = $request->input('message');
        event(new ButtonClicked($message, $user));
        return response()->json(['status' => 'success']);
    }
}
