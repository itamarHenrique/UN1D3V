<?php

namespace App\Http\Controllers;

use App\Http\Resources\AgendamentoResource;
use App\Models\Agendamento;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    private $agendamento;

    public function __construct(Agendamento $agendamento)
    {
        $this->agendamento = $agendamento;
    }

    public function index(Request $request)
    {
        $agendamentos = $this->agendamento->all();

        return AgendamentoResource::collection($agendamentos);
    }

    public function show(Agendamento $agendamento)
    {
        return new AgendamentoResource($agendamento);
    }

}
