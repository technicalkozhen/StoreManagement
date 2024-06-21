<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\expensesController;
use App\Http\Controllers\InvoiceBuyController;
use App\Http\Controllers\InvoiceSellController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\userController;
use App\Models\expense;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::get('/', [PublicController::class , 'index'])->name('public');
    
    
    
    
    Route::middleware(['User1'])->group(function () {
        
    });
    Route::middleware(['User2'])->group(function () {
        
    });
    Route::middleware(['User3'])->group(function () {
        
    });
    
    
    Route::get('addProductToTable/{id}', [PublicController::class , 'addProductToTable'])->name('addProductToTable');
    Route::get('deleteProductToTable/{id}', [PublicController::class , 'deleteProductToTable'])->name('deleteProductToTable');
    Route::get('increaceNumberQuantity/{id}', [PublicController::class , 'increaceNumberQuantity'])->name('increaceNumberQuantity');
    Route::get('decreaceNumberQuantity/{id}', [PublicController::class , 'decreaceNumberQuantity'])->name('decreaceNumberQuantity');
    Route::get('buyproduct/{state}', [PublicController::class , 'buyproduct'])->name('buyproduct');
    Route::get('sellproduct/{state}', [PublicController::class , 'sellproduct'])->name('sellproduct');
    Route::get('deleteInvoice/{id}', [InvoiceBuyController::class , 'deleteInvoice'])->name('deleteInvoice');
    Route::get('deleteInvoice/{id}', [InvoiceSellController::class , 'deleteInvoice'])->name('deleteInvoice');



    
    
    Route::resource('public/product', ProductController::class)->except('show');
    Route::resource('public/user', userController::class)->except('show');
    Route::resource('public/expense', expensesController::class)->except('show');
    Route::resource('public/invoiceBuy', InvoiceBuyController::class)->except('create','store');
    Route::resource('public/invoiceSell', InvoiceSellController::class)->except('create','store');



    Route::get('expenseReport', function(){
        $data=expense::with('users')->get();
       return view('public.print.expenseReport',compact('data'));
    })->name('expenseReport');

    Route::get('expenseSumReport', function(){
        $data=expense::with('users')->get();
        $prices=0;
        foreach($data as $value){
            $prices=$prices+$value->price;
        }
        return view('public.print.expenseSumReport',compact('data','prices'));
    })->name('expenseSumReport');

    Route::get('invoiceReport', function(){
        $invoice=Invoice::with('productinvoices')->with('users')->get();
        $totalprice=0;
       return view('public.print.invoiceReport',compact('invoice','totalprice'));
    })->name('invoiceReport');

    Route::get('productReport', function(Request $request){
        $product=Product::query();
        if($request->search){
            $product->where('name','like','%'.$request->search.'%');
        }
       return view('public.print.productReport',compact('product'));
    })->name('productReport');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
