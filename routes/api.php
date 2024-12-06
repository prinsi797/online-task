<?php

use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;
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

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class,'index']);
    Route::post('/', [CategoryController::class,'store']);
    Route::put('/{id}', [CategoryController::class,'update']);
    Route::delete('/{id}', [CategoryController::class,'destroy']);


    Route::prefix('{category_id}/subcategories')->group(function () {
        Route::get('/', [SubcategoryController::class,'index']);
        Route::post('/', [SubcategoryController::class,'store']);
        Route::put('/{id}', [SubcategoryController::class,'update']);
        Route::delete('/{id}', [SubcategoryController::class,'destroy']);
    });

Route::prefix('{category_id}/products')->group(function () {
    Route::get('/', [ProductController::class,'index']);
    Route::post('/', [ProductController::class,'store']);
    Route::put('/{id}', [ProductController::class,'update']);
    Route::delete('/{id}', [ProductController::class,'destroy']);
});

});