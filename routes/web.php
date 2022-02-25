<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [PostController::class, 'index']);
Route::get('/post/{post}', [PostController::class, 'post'])->name('post');

Route::get('/category/{slug}', [CategoryController::class, 'index'])->name('category');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
