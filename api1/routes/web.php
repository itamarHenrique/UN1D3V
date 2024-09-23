<?php

use App\Http\Controllers\HelloController;
use Illuminate\Support\Facades\Route;

Route::get('/alunos', [HelloController::class, 'alunos']);
Route::get('/alunos/aprovados', [HelloController::class, 'alunosAprovados']);

Route::get('{nome}', [HelloController::class, 'sayHello']);

// Route::get('{nome}', function ($nome) {
//     return strtoupper($nome);
// });

Route::get('/', function(){
    return view('welcome');
});

