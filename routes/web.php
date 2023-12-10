<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AuthLoginController;
use App\Http\Controllers\Auth\AuthRegisterController;
use App\Http\Controllers\Auth\AuthLogoutController;
use App\Http\Controllers\BasketController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('basket', BasketController::class);
Route::resource('category', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('currency', CurrencyController::class);

Route::resource('/login', AuthLoginController::class);
Route::resource('/register', AuthRegisterController::class);
// Route::resource('/logout', AuthLogoutController::class);


