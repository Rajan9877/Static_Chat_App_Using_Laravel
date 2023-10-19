<?php

namespace App\Http\Controllers;

use App\Events\ButtonClicked;
use Illuminate\Http\Request;

class ButtonClickedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        ButtonClicked::dispatch(message: 'Hello world!');

        return response()->json(['success' => true]);
    }
}
