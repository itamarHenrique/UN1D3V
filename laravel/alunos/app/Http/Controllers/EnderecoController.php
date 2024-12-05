<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnderecoPostRequest;
use App\Models\Endereco;
use App\Services\EnderecoService;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    private $endereco;

    public function __construct(EnderecoService $endereco)
    {
        $this->endereco = $endereco;
    }


    public function index()
    {
        $endereco = $this->endereco->getAll();

        return $endereco;
    }

    public function getById($id)
    {
        $endereco = $this->endereco->getById($id);

        return $endereco;
    }

    public function createEndereco(EnderecoPostRequest $request)
    {
        $data = $request->validated();

        $endereco = $this->endereco->createEndereco($data);

        if(!$endereco){
            return response()->json(['message' => 'Erro ao criar endereço'], 400);
        }

        return $endereco;
    }
}
