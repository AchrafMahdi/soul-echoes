<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/blog', [PostController::class,"index"])->middleware('auth');
Route::get('/blog/{post}', [PostController::class,"show"])->middleware('auth');
Route::get('/blogs/create', [PostController::class,"create"])->middleware('adminOnly');
Route::get('/blogs/{id}/edit', [PostController::class,"edit"])->middleware('adminOnly');
Route::post('/blogs/{id}/edit', [PostController::class,"update"])->middleware('adminOnly');
Route::post('/blog/create', [PostController::class,"store"])->middleware('auth');
Route::post('/blog/{id}/comments', [CommentController::class,"store"])->middleware('auth');

Route::get('/profile', [UserController::class,"edit"])->middleware('auth');
Route::post('/{id}/profile', [UserController::class,"update"])->middleware('auth');



Route::get('/register', [UserController::class,'create'])->name('register')->middleware('guest');
Route::post('/register', [UserController::class,'store']);

Route::get('/login', [SessionController::class,'create'])->name('login')->middleware('guest');
Route::post('/login', [SessionController::class,'store']);