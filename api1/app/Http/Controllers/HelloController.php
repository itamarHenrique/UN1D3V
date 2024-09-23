<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class HelloController extends Controller
{

    private $aluno;
    private $request;

    public function __construct(Aluno $aluno, Request $request)
    {
        $this->aluno = $aluno;
        $this->request = $request;
    }

    public function sayHello($nome)
    {
        return strtoupper($nome);
    }

    public function alunos()
    {

        $filtro = $this->request->get('palavraChave');


        $alunos = $this->aluno->obterAlunos($filtro);

        return $alunos;
    }

    public function alunosAprovados()
    {

        $alunosAprovados = $this->aluno->obterAlunosAprovados();

        return $alunosAprovados;


    }
}
