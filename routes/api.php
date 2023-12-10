<?php

use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\PassportAuthController;
use App\Http\Controllers\Api\PostApiController;
use App\Http\Controllers\Api\ProductApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);
Route::get('userDetails', [PassportAuthController::class, 'userDetails']);

Route::middleware('auth:api')->group(function () {
    Route::apiResources(['category' => CategoryApiController::class]);
    Route::apiResources(['products' => ProductApiController::class]);

})->middleware(['auth:api', 'scope:manager-category']);






