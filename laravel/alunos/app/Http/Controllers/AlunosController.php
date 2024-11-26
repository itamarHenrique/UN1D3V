<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunoPostRequest;
use App\Http\Resources\AlunoResource;
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

    public function createAluno(AlunoPostRequest $request)
    {
        $data = $request->validated();

        $alunoCriado = $this->aluno->createAluno($data);

        if(!$alunoCriado){
            return response()->json(['message' => 'Erro ao criar aluno!'], 400);
        }

        return new AlunoResource($alunoCriado);

    }

    public function deleteAluno($id)
    {
        return $this->aluno->deleteAluno($id);
    }
}
