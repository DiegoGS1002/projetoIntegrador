<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;

Route::get('/', function () {
    return view('home-page');
})->name('home');

/*
|--------------------------------------------------------------------------
| Clients
|--------------------------------------------------------------------------
*/
Route::resource('clients', ClientController::class);

/*
|--------------------------------------------------------------------------
| Products
|--------------------------------------------------------------------------
*/
Route::resource('products', ProductController::class);

/*
|--------------------------------------------------------------------------
| Suppliers
|--------------------------------------------------------------------------
*/
Route::resource('suppliers', SupplierController::class);


Route::resource('client', ClientController::class)->names('clients');
Route::resource('product', ProductController::class)->names('products');
Route::resource('supplier', SupplierController::class)->names('suppliers');
