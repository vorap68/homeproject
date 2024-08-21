<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);

});

// Для работы с категориями и товарами аутентиф НЕ нужна
Route::get('/categories', [App\Http\Controllers\Api\CategoryController::class, 'index']);
Route::get('/products', [App\Http\Controllers\Api\ProductController::class, 'getAll']);
Route::post('/products', [App\Http\Controllers\Api\ProductController::class, 'getSelected']);
Route::get('/product/slug/{slug}', [App\Http\Controllers\Api\ProductController::class, 'slug']);
