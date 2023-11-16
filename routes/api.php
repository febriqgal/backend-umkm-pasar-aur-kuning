<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('/users', App\Http\Controllers\Api\UserController::class);
Route::apiResource('/category', App\Http\Controllers\Api\CategoryController::class);

Route::apiResource('/carts', App\Http\Controllers\Api\CartController::class);
Route::get('/carts/user/{userId}', [App\Http\Controllers\Api\CartController::class, 'showUserId']);
Route::get('/carts/search/{q}', [App\Http\Controllers\Api\CartController::class, 'search']);

Route::apiResource('/products', App\Http\Controllers\Api\ProductController::class);
Route::get('/products/user/{userId}', [App\Http\Controllers\Api\ProductController::class, 'showUserId']);
Route::get('/products/search/{q}', [App\Http\Controllers\Api\ProductController::class, 'search']);
