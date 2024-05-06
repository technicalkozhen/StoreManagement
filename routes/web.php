<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PublicController::class , 'index'])->name('public');
Route::resource('public/product', ProductController::class)->except('show');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
