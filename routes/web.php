<?php

use Illuminate\Support\Facades\Artisan;
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
Route::get('/basket/add/{product}', [App\Http\Controllers\Web\BasketController::class, 'add'])->name('basket.add');
Route::middleware('basket_web_empty')->group(function () {
    Route::get('/basket/show', [App\Http\Controllers\Web\BasketController::class, 'showBasket'])->name('basket.show');
    Route::get('/basket/minus/{product}', [App\Http\Controllers\Web\BasketController::class, 'minus'])->name('basket.minus');
    Route::get('/basket/remove/{product}', [App\Http\Controllers\Web\BasketController::class, 'remove'])->name('basket.remove');
    Route::get('/order/place/{order}', [App\Http\Controllers\Web\OrderController::class, 'place'])->name('order.place');
    Route::post('/order/confirm/{order}', [App\Http\Controllers\Web\OrderController::class, 'confirm'])->name('order.confirm');

});

/**
 * Маршруты для Админ Панели
 */
Route::name('admin.')->prefix('/admin')->middleware('auth', 'is_admin')->group(function () {
    Route::get('/main', function () {
        return view('admin.main');
    });
    Route::resource('/category', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('/product', App\Http\Controllers\Admin\ProductController::class);
    Route::get('/orders', [App\Http\Controllers\Admin\OrderController::class, 'allOrders'])->name('order.all');
    Route::get('/order/{order}', [App\Http\Controllers\Admin\OrderController::class, 'single'])->name('order.single');
    Route::delete('/order{order}', [App\Http\Controllers\Admin\OrderController::class, 'destroy'])->name('order.destroy');
    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'allUsers'])->name('user.all');
    Route::get('/user/{user}', [App\Http\Controllers\Admin\UserController::class, 'ordersForUser'])->name('user.order');
    Route::delete('/user/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('user.destroy');

});

/**
 * обнуление сессии
 */
Route::get('session/clear', function () {

    session()->flush();
    session()->forget('order_id');
    return redirect()->route('index');
})->name('session.clear');

/**
 * сброс базы данных
 */
Route::get('base/clear', function () {
    Artisan::call('migrate:fresh', [
        '--seed' => true,
    ]);
    return redirect()->route('index');
})->name('base.clear');
