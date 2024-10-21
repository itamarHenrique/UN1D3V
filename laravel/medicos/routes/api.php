<?php

use App\Http\Controllers\HospitalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('/medico', function(){
    Route::get('/', [HospitalController::class, 'index']);
})
