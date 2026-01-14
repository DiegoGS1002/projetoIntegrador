<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home-page');
});

Route::get('/supplier', function () {
    return view('supplier');
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/client', function () {
    return view('clients');
});

