<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/products', \App\Http\Controllers\ProductController::class);
Route::resource('/transactions', \App\Http\Controllers\TransactionController::class);
Route::get('/search', [ProductController::class, 'search'])->name('search'); // Define the route for the 'show' method
