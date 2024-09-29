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
Route::post('/property/change/', [App\Http\Controllers\Api\ProductController::class, 'changeProperty']);

// Корзина Заказ
Route::get('basket/add/{id}', [App\Http\Controllers\Api\BasketController::class, 'add']);
Route::middleware('check_user_auth')->group(function () {
    Route::get('/orders', [App\Http\Controllers\Api\OrderController::class, 'allOrders']);
    Route::middleware('basket_api_empty')->group(function () {
        Route::get('/basket/minus/{id}', [App\Http\Controllers\Api\BasketController::class, 'minus']);
        Route::get('/basket/show', [App\Http\Controllers\Api\BasketController::class, 'show']);
        Route::post('/order/submit', [App\Http\Controllers\Api\OrderController::class, 'submit']);
    });
});

/**
 * маршруты для VueJs
 */

Route::prefix('/vue')->group(function () {
    Route::post('store', [App\Http\Controllers\VueJs\ProductController::class, 'store']);
    Route::get('index', [App\Http\Controllers\VueJs\ProductController::class, 'index']);
    Route::patch('update/{product}', [App\Http\Controllers\VueJs\ProductController::class, 'update']);
    Route::delete('delete/{product}', [App\Http\Controllers\VueJs\ProductController::class, 'delete']);
    Route::get('product/{product}', [App\Http\Controllers\VueJs\ProductController::class, 'show']);
});
