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

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category/{category}', [App\Http\Controllers\Web\CategoryController::class, 'getCategory'])->name('category');
Route::get('/products', [App\Http\Controllers\Web\ProductController::class, 'productAll'])->name('products');
Route::get('/product/{product}', [App\Http\Controllers\Web\ProductController::class, 'productSingle'])->name('product');
Route::post('/products', [App\Http\Controllers\Web\ProductController::class, 'productSearch'])->name('products.search');
