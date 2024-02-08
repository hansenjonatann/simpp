<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockInController;
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

Route::get('products' , [ProductController::class , 'index']);
Route::post('products/create' , [ProductController::class , 'create']);
Route::delete('products/delete/{id}' , [ProductController::class , 'destroy']);
Route::put('products/update/{id}' , [ProductController::class , 'update']);



Route::get('categories' , [CategoryController::class , 'index']);
Route::post('categories/create' , [CategoryController::class , 'create']);
Route::put('categories/update/{id}' , [CategoryController::class , 'update']);


Route::get('stockins' , [StockInController::class , 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
