<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductSupplierController;

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

Route::get(
    '/products/{product}/suppliers',
    [ProductSupplierController::class, 'index']
)->name('products.suppliers.index');

Route::post(
    '/products/{product}/suppliers',
    [ProductSupplierController::class, 'store']
)->name('products.suppliers.store');

Route::delete(
    '/products/{product}/suppliers/{supplier}',
    [ProductSupplierController::class, 'destroy']
)->name('products.suppliers.destroy');

