<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::group(["middleware" => "auth"], function () {
    //Home Routes
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::get('/change-password', [App\Http\Controllers\ProfileController::class, 'changePassword']);
    Route::post('/update-password', [App\Http\Controllers\ProfileController::class, 'updatePassword']);
    Route::resource('/profile', App\Http\Controllers\ProfileController::class);
    Route::resource('/categories', App\Http\Controllers\CategoriesController::class);
    Route::resource('/users', App\Http\Controllers\UserController::class);
    Route::resource('/products', App\Http\Controllers\ProductController::class);
});

