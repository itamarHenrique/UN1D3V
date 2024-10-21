<?php

use App\Http\Controllers\EspecialidadeController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\MedicoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('hospital')->group(function (){
    Route::get('/', [HospitalController::class, 'index']);
    Route::get('/{hospital}', [HospitalController::class, 'show']);
});

Route::prefix('especialidade')->group(function (){
    Route::get('/', [EspecialidadeController::class, 'index']);
    Route::get('/{especialidade}', [EspecialidadeController::class, 'show']);
});

Route::prefix('medicos')->group(function (){
    Route::get('/', [MedicoController::class, 'index']);
    Route::get('/{medico}', [MedicoController::class, 'show']);
});
