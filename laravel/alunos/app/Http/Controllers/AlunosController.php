<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunoPostRequest;
use App\Http\Requests\EnderecoPostRequest;
use App\Http\Resources\AlunoResource;
use App\Models\Aluno;
use App\Models\Endereco;
use App\Services\AlunoService;
use App\Services\EnderecoService;
use Illuminate\Http\Request;

class AlunosController extends Controller
{
    private $alunoService;
    private $enderecoService;
    private $aluno;
    private $endereco;



    public function __construct(AlunoService $alunoService, EnderecoService $enderecoService, Aluno $aluno, Endereco $endereco)
    {
        $this->alunoService = $alunoService;
        $this->enderecoService = $enderecoService;
        $this->aluno = $aluno;
        $this->endereco = $endereco;
    }

    public function index()
    {
        $alunos = $this->alunoService->getAll();

        return AlunoResource::collection($alunos);
    }

    public function getById($id)
    {
        $aluno = $this->alunoService->getById($id);

        return AlunoResource::collection($aluno);
    }

    public function createAluno(AlunoPostRequest $request)
    {
        $data = $request->validated();

        $dataEndereco = $data['enderecos'];

        $aluno = $this->alunoService->createAluno($data);

        if(!$aluno){
            return response()->json(['message' => 'Erro ao criar aluno!'], 400);
        }

        $endereco = $this->enderecoService->createEndereco($dataEndereco);

        $aluno->enderecos()->attach($endereco->id);

        $aluno->load('enderecos');

        return new AlunoResource($aluno);

    }

    public function deleteAluno($id)
    {
        return $this->alunoService->deleteAluno($id);
    }
}
