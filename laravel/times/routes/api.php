<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/times', [TeamController::class, 'getAll']);

Route::post('/times', [TeamController::class, 'createTeam']);

Route::get('/times/sem-jogadores', [TeamController::class, 'getWithoutPlayers']);
