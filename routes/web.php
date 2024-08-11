<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

/**
 * обнуление сессии
 */
Route::get('session/clear', function () {
    //session()->flush();
    session()->forget('order_id');
    return redirect()->route('index');
})->name('session.clear');

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category/{category}', [App\Http\Controllers\Web\CategoryController::class, 'getCategory'])->name('category');
Route::get('/products', [App\Http\Controllers\Web\ProductController::class, 'productAll'])->name('products');
Route::get('/product/{product}', [App\Http\Controllers\Web\ProductController::class, 'productSingle'])->name('product');
Route::post('/products', [App\Http\Controllers\Web\ProductController::class, 'productSearch'])->name('products.search');

/**
 * Маршруты для корзины-заказа
 */
Route::get('basket/add/{product}', [App\Http\Controllers\Web\BasketController::class, 'add'])->name('basket.add');
Route::middleware('is_basket_empty_web')->group(function () {
    Route::get('basket/show', [App\Http\Controllers\Web\BasketController::class, 'showBasket'])->name('basket.show');
    Route::get('basket/minus/{product}', [App\Http\Controllers\Web\BasketController::class, 'minus'])->name('basket.minus');
    Route::get('/basket/remove/{product}', [App\Http\Controllers\Web\BasketController::class, 'remove'])->name('basket.remove');

    Route::get('order/place/{order}', [App\Http\Controllers\Web\OrderController::class, 'place'])->name('order.place');
    Route::post('order/confirm/{order}', [App\Http\Controllers\Web\OrderController::class, 'confirm'])->name('order.confirm');

});
