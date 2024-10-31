<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::post('/products/{id}/order', [ProductController::class, 'store'])->name('orders.store');
Route::get('/orders/{orderId}', [ProductController::class, 'getOrderDetails'])->name('orders.details');

