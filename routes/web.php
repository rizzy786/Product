<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
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

Route::get('/product', [ProductController::class, 'index'])->name('product-index');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product-show');

Route::post('/purchase/{id}', [PurchaseController::class, 'store']);

Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product-edit')/*->middleware('auth','checkrole:admin')*/;

Route::delete('/product/{id}', [ProductController::class, 'destroy']);

Route::post('/product/create', [ProductController::class, 'store']);
