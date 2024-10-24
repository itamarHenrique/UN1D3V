<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/show/{id}', [ProductController::class, 'show'])->where('id', '[0-9]+');

Route::post('/products/adiciona', [ProductController::class, 'store']);

Route::get('/products/adiciona', [ProductController::class, 'adiciona']);

Route::delete('/products/delete/{id}', [ProductController::class, 'deleteById']);
