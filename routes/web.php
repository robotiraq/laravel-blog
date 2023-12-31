<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\services\Newsletter;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

Route::post('newsletter', NewsletterController::class);

Route::get('/', [PostController::class,'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class,'show']);

Route::post('posts/{post:slug}/comments', [PostCommentsController::class,'store']);

Route::get('register',[RegisterController::class,'create'])->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');

Route::post('logout',[SessionsController::class,'destroy'])->middleware('auth');

Route::get('login',[SessionsController::class,'create'])->middleware('guest');
Route::post('sessions',[SessionsController::class,'store'])->middleware('guest');

Route::get('admin/posts/create',[PostController::class,'create'])->middleware('can:admin');
Route::post('admin/posts',[PostController::class,'store'])->middleware('can:admin');
Route::get('admin/posts/{post}/edit',[PostController::class,'edit'])->middleware('can:admin');
Route::patch('admin/posts/{post}',[PostController::class,'update'])->middleware('can:admin');
Route::delete('admin/posts/{post}',[PostController::class,'destroy'])->middleware('can:admin');