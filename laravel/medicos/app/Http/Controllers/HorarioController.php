<?php

namespace App\Http\Controllers;

use App\Http\Resources\HorarioResource;
use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    private $horario;

    public function __construct(Horario $horario){
        $this->horario = $horario;
    }

    public function index(Request $request)
    {
        $horarios = $this->horario->all();
        return HorarioResource::collection($horarios);
    }

    public function show(Horario $horario){
        return new HorarioResource($horario);
    }
}
