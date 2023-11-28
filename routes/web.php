<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/documentation', [HomeController::class, 'documentation'])->name('home.documentation');

Route::controller(LoginController::class)->group(function() {
    Route::get('/register', 'register')->name('register.index');
    Route::post('/register', 'save')->name('register.save');
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'store')->name('login.store');
    Route::get('/logout', 'destroy')->name('login.destroy');
});


Route::controller(CategoryController::class)->group(function() {
    Route::get('/category', 'index')->middleware('auth')->name('category.index');
    Route::get('/category/{id}', 'specific')->middleware('auth')->name('category.specific');
});

Route::controller(PostController::class)->group(function() {
    Route::post('/post/like-button', 'likeButton')->middleware('auth')->name('post.like-button');
    Route::post('/create-post', 'store')->middleware('auth')->name('post.store');

});
