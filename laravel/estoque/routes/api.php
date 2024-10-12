<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/show', [ProductController::class, 'show']);

Route::post('/products', [ProductController::class, 'store']);
