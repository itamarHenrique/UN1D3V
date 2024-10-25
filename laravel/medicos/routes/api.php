<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\EspecialidadeController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Models\Horario;
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

Route::prefix('agendamentos')->group(function(){
    Route::get('/', [AgendamentoController::class, 'index']);
    Route::get('/{agendamento}', [AgendamentoController::class, 'show']);
});

Route::prefix('horarios')->group(function(){
    Route::get('/', [HorarioController::class, 'index']);
    Route::get('/{horario}', [HorarioController::class, 'show']);
});

Route::prefix('pacientes')->group(function(){
    Route::get('/', [PacienteController::class, 'index']);
    Route::get('/{paciente}', [PacienteController::class, 'show']);
});
