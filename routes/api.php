<?php

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\ProductResourceJson;
use App\Http\Middleware\Api\EnsureTokenIsValid;
use App\Http\Resources\ProductCategoryResourceJson;
use App\Http\Controllers\Api\ProductCategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(EnsureTokenIsValid::class)->group(function () {
    Route::prefix(config('my.api_version'))->group(function () {
        Route::prefix('products')->group(function () {
            Route::get('/', function () {
                return ProductResourceJson::collection(Product::paginate(config('my.api_paginate')));
            });

            Route::get('/{id}', function ($id) {
                return ProductResourceJson::make(Product::find($id));
            });
        });

        Route::prefix('product-categories')->group(function () {
            Route::get('/', function () {
                return ProductCategoryResourceJson::collection(ProductCategory::paginate(config('my.api_paginate')));
            });

            Route::get('/{id}', function ($id) {
                return ProductCategoryResourceJson::make(ProductCategory::find($id));
            });

            Route::post('/', [ProductCategoryController::class, 'store']);

            Route::put('/{id}', [ProductCategoryController::class, 'update']);

            Route::delete('/{id}', [ProductCategoryController::class, 'destroy']);

            Route::fallback(function () {
                return response()->json([
                    'message' => 'Resource not found'], 404);
            });
        });
    });
});
