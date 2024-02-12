<?php

use Illuminate\Support\Facades\Route;

//* USER
Route::apiResource('/user', App\Http\Controllers\Api\UserController::class);

//* CATEGORY

//* CART
Route::apiResource('/cart', App\Http\Controllers\Api\CartController::class);
Route::get('/cart/user/{userId}', [App\Http\Controllers\Api\CartController::class, 'showUserId']);
Route::get('/cart/search/{q}', [App\Http\Controllers\Api\CartController::class, 'search']);

//* PRODUCT
Route::apiResource('/product', App\Http\Controllers\Api\ProductController::class);
Route::get('/product/user/{userId}', [App\Http\Controllers\Api\ProductController::class, 'showUserId']);
Route::get('/product/search/{q}', [App\Http\Controllers\Api\ProductController::class, 'search']);

//* ORDER
Route::apiResource('/order', App\Http\Controllers\Api\OrderController::class);
Route::get('/order/status/{status}', [App\Http\Controllers\Api\OrderController::class, 'filterStatus']);
Route::get('/order/toko/{toko}', [App\Http\Controllers\Api\OrderController::class, 'filterToko']);
