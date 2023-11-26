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

//Route::apiResources(['category' => CategoryApiController::class]);
//
//Route::apiResources(['products' => ProductApiController::class]);


Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);
Route::get('userDetails', [PassportAuthController::class, 'userDetails']);

Route::middleware('auth:api')->group(function () {
    Route::apiResources(['category' => CategoryApiController::class]);
    Route::apiResources(['products' => ProductApiController::class]);

})->middleware(['auth:api', 'scope:manager-category']);


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


//Route::apiResource('projects', ProjectController::class)->middleware('auth:api');








//
//Route::get('category', function () {
//    Route::apiResources(['category' => CategoryApiController::class]);
//})->middleware(['auth:api', 'scope:manager-category']);

//Route::middleware(['auth:api', 'scope:create-posts'])->post('posts', function () {
//    Route::apiResources(['posts' => PostApiController::class]);
//});

//Route::get('/manager', function () {
//    Route::apiResources(['posts' => PostApiController::class]);
//})->middleware('auth:api', 'scope:manager');

// идем в App\Http\Kernel
// protected $middlewareAliases = [
//'scopes' => CheckScopes::class,
//'scope' => CheckForAnyScope::class,
// Category

//можно все кроме create', 'edit
//Route::apiResources('categories', 'CategoryController')
//    ->except(['create', 'edit']);
//Route::resource('categories.products', 'Category\CategoryProductController')
//    ->only(['index']);
//Route::resource('categories.sellers', 'Category\CategorySellerController')
//    ->only(['index']);
//Route::resource('categories.transactions', 'Category\CategoryTransactionController')
//    ->only(['index']);
//Route::resource('categories.buyers', 'Category\CategoryBuyerController')
//    ->only(['index']);
