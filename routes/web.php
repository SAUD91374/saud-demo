<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
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
    
    // route::get('/',[HomeController::class,'index']); 
    // category or product listing
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::get('/deleteimg/{id}',[ProductController::class,'imageDelete']);
    // Route::resource('/user', UserController::class);
    // don't use of this cart routes that's why commented
    // Route::resource('/cart', CartController::class);
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/home', [App\Http\Controllers\UserController::class, 'index'])->name('home');
    Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');

// routes/web.php
});
Auth::routes();