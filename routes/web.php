<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Home\PostAdminController;
use App\Http\Controllers\Home\CommentAdminController;
use App\Http\Controllers\Home\CategoryAdminController;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [PostController::class, 'index']);
Route::get('/post/{post}', [PostController::class, 'post'])->name('post');

Route::get('/category/{slug}', [CategoryController::class, 'index'])->name('category');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/home/post', PostAdminController::class);
Route::resource('/home/comment', CommentAdminController::class);
