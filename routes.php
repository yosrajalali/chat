<?php 

use App\Core\Routing\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChatController;


Route::get('/', [LoginController::class, 'index']);
Route::post('/login/store', [LoginController::class, 'store']);

Route::get('/register/index', [RegisterController::class, 'index']);
Route::post('/register/store', [RegisterController::class, 'store']);

Route::get('/chats/index', [ChatController::class, 'index']);
Route::get('/chats/show', [ChatController::class, 'show']);
Route::post('/chats/store', [ChatController::class, 'store']);
Route::post('/chats/delete', [ChatController::class, 'delete']);
Route::get('/chats/edit', [ChatController::class, 'edit']);
Route::post('/chats/update', [ChatController::class, 'update']);




