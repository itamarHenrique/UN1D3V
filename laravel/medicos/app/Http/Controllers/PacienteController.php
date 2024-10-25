<?php

namespace App\Http\Controllers;

use App\Http\Resources\PacienteResource;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    private $paciente;

    public function __construct(Paciente $paciente)
    {
        $this->paciente = $paciente;
    }

    public function index(Request $request)
    {
        $pacientes = $this->paciente->all();

        return PacienteResource::collection($pacientes);
    }

    public function show(Paciente $paciente)
    {
        return new PacienteResource($paciente);
    }
}
