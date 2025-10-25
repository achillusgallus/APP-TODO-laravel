<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\Auth\LoginController;

Auth::routes();

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/posts',[PostController::class,'index'])->name('posts.index');
    Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
    Route::post('/posts/store',[PostController::class,'store'])->name('posts.store');
    Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');
    Route::put('/posts/{post}/update',[PostController::class,'update'])->name('posts.update');
    Route::get('/posts/{post}/show',[PostController::class,'show'])->name('posts.show');
    Route::delete('/posts/{post}/destroy',[PostController::class,'destroy'])->name('posts.destroy');
});
