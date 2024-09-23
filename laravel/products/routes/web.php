<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos/categorias/{category?}', [ProductsController::class,'getByCategory']);
Route::get('/produtos', [ProductsController::class, 'getAll']);
Route::get('/produtos/estoque-baixo', [ProductsController::class,'getWithLowStock']);
Route::get('/categorias', [ProductsController::class,'getCategories']);
Route::get('/produtos/{id}', [ProductsController::class, 'getById']);

