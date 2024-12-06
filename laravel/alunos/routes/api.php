<?php

use App\Http\Controllers\AlunosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




Route::prefix('alunos')->group(function(){
    Route::get('/', [AlunosController::class, 'index']);
    Route::get('/{id}', [AlunosController::class, 'getById']);
    Route::post('/', [AlunosController::class, 'createAluno']);
    Route::delete('/{id}', [AlunosController::class, 'deleteAluno']);
    Route::patch('/{id}', [AlunosController::class, 'updateAluno']);
});
