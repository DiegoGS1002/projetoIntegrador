<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductSupplierController;

Route::get('/', function () {
    return view('home-page');
})->name('home');

// Print/list export routes (moved before resource routes to avoid conflict with resource show routes)
Route::get('/clients/print', [ClientController::class, 'print'])->name('clients.print');
Route::get('/products/print', [ProductController::class, 'print'])->name('products.print');
Route::get('/suppliers/print', [SupplierController::class, 'print'])->name('suppliers.print');

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

// Print/list export routes
Route::get('/clients/print', [ClientController::class, 'print'])->name('clients.print');
Route::get('/products/print', [ProductController::class, 'print'])->name('products.print');
Route::get('/suppliers/print', [SupplierController::class, 'print'])->name('suppliers.print');
