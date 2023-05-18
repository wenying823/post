<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/post', PostController::class . '@index');
Route::post('/post/create', PostController::class . '@create')->name('post.create');
Route::get('/post/{id}', PostController::class . '@show');
Route::post('/post/createMessage/{id}', PostController::class . '@messageCreate')->name('message.create');
