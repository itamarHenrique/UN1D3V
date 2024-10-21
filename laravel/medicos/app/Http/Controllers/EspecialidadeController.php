<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use Illuminate\Http\Request;

class EspecialidadeController extends Controller
{
    private $especialidade;

    public function __construct(Especialidade $especialidade)
    {
        $this->especialidade = $especialidade;
    }

    public function index()
    {
        $especialidade = $this->especialidade->all();

        return $especialidade;
    }

    public function show(Especialidade $especialidade)
    {
        return $especialidade
    }
}
