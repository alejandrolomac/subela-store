<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ContactController;

Route::get('/', [App\Http\Controllers\StoreController::class, 'index']);
Auth::routes();
 
Route::resource('/products', ProductController::class);

Route::get('/messages', [ContactController::class, 'messages']);
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact-form', [ContactController::class, 'message']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');