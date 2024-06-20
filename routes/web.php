<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;

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
    return view('auth/login');
}); 
Route::middleware('auth')->group(function(){
Route::resource('/category', CategoryController::class);

Route::resource('/product', ProductController::class);
Route::get('/deleteimg/{id}',[ProductController::class,'imageDelete']);

Route::get('/home', [App\Http\Controllers\UserController::class, 'index'])->name('home');
// routes/web.php
Route::resource('/user', UserController::class);
Route::resource('/cart', CartController::class);

Route::resource('/cart', CartController::class);
Route::get('/cart/{id}', [CartController::class, 'show'])->name('cart.index');

// Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
// Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
// Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
});
Auth::routes();