<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/home', [HomeController::class, 'index']);

Route::get('/cart', [CartController::class, 'index']);
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart']);
Route::post('/editcart', [CartController::class, 'editCart']);
Route::delete('/cart/{id}', [CartController::class, 'destroy']);

Route::get('/checkout', [CheckoutController::class, 'index']);
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

Route::get('/product', [ProductController::class, 'index'])->name('product-index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product-show');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product-edit')/*->middleware('auth','checkrole:admin')*/;

Route::put('/product/{id}', [ProductController::class, 'update']);
Route::delete('/product/{id}', [ProductController::class, 'destroy']);

Route::post('/product/create', [ProductController::class, 'store']);

Route::post('/purchase/{id}', [PurchaseController::class, 'store']);
