<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunosController extends Controller
{
    private $aluno;

    public function __construct(Aluno $aluno)
    {
        $this->aluno = $aluno;
    }

    public function index()
    {
        $alunos = $this->aluno->getAll();

        return $alunos;
    }

    public function getById($id)
    {
        return $this->aluno->getById($id);
    }
}
