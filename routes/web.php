<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ButtonClickedController;
use App\Http\Controllers\ChatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('button/clicked', [ButtonClickedController::class]);
Route::post('chat', [ChatController::class, 'index'])->name('chat');