<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\expensesController;
use App\Http\Controllers\InvoiceBuyController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::get('/', [PublicController::class , 'index'])->name('public');
    Route::get('addProductToTable/{id}', [PublicController::class , 'addProductToTable'])->name('addProductToTable');
    Route::get('deleteProductToTable/{id}', [PublicController::class , 'deleteProductToTable'])->name('deleteProductToTable');
    Route::get('increaceNumberQuantity/{id}', [PublicController::class , 'increaceNumberQuantity'])->name('increaceNumberQuantity');
    Route::get('decreaceNumberQuantity/{id}', [PublicController::class , 'decreaceNumberQuantity'])->name('decreaceNumberQuantity');
    Route::get('buyproduct/{state}', [PublicController::class , 'buyproduct'])->name('buyproduct');
    Route::get('sellproduct/{state}', [PublicController::class , 'sellproduct'])->name('sellproduct');




    Route::resource('public/product', ProductController::class)->except('show');
    Route::resource('public/expense', expensesController::class)->except('show');
    Route::resource('public/user', userController::class)->except('show');
    Route::resource('public/invoiceBuy', InvoiceBuyController::class)->except('create','store');




});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
