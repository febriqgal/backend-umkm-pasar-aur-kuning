<?php

use Illuminate\Support\Facades\Route;

//* USER
Route::apiResource('/users', App\Http\Controllers\Api\UserController::class);

//* CATEGORY

//* CART
Route::apiResource('/carts', App\Http\Controllers\Api\CartController::class);
Route::get('/carts/user/{userId}', [App\Http\Controllers\Api\CartController::class, 'showUserId']);
Route::get('/carts/search/{q}', [App\Http\Controllers\Api\CartController::class, 'search']);

//* PRODUCT
Route::apiResource('/products', App\Http\Controllers\Api\ProductController::class);
Route::get('/products/user/{userId}', [App\Http\Controllers\Api\ProductController::class, 'showUserId']);
Route::get('/products/search/{q}', [App\Http\Controllers\Api\ProductController::class, 'search']);

//* ORDER
Route::apiResource('/orders', App\Http\Controllers\Api\OrderController::class);
Route::get('/orders/status/{status}', [App\Http\Controllers\Api\OrderController::class, 'filterStatus']);
Route::get('/orders/toko/{toko}', [App\Http\Controllers\Api\OrderController::class, 'filterToko']);
