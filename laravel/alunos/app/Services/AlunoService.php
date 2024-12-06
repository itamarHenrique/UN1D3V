<?php

namespace App\Services;

use App\Models\Aluno;

class AlunoService
{

    private $aluno;
    private $enderecoService;

    public function __construct(Aluno $aluno, EnderecoService $enderecoService) {
        $this->aluno = $aluno;
        $this->enderecoService = $enderecoService;
    }

    public function getAll()
    {
        return Aluno::all();
    }

    public function getById($id)
    {
        return Aluno::findOrFail($id);
    }

    public function createAluno($data)
    {

        $endereco = isset($data['endereco']) ? $data['endereco'] : null;

        return Aluno::create([
            'primeiro_nome' => $data['primeiro_nome'],
            'sobrenome' => $data['sobrenome'],
            'endereco' => $endereco,
            'RA' => $data['RA'],
            'email' => $data['email'],
            'unidade_de_ensino' => $data['unidade_de_ensino']
        ]);
    }

    public function deleteAluno($id)
    {
        return Aluno::where('id', $id)->delete();
    }

    public function updateAluno($data, $id)
    {

        $aluno = $this->getById($id);

        $aluno->update([
            'primeiro_nome' => $data['primeiro_nome'],
            'sobrenome' => $data['sobrenome'],
            'RA' => $data['RA'],
            'email' => $data['email'],
            'unidade_de_ensino' => $data['unidade_de_ensino']
        ]);

        if(isset($data['enderecos'])){
            $enderecoData = $data['enderecos'];

            $endereco = $this->enderecoService->updateEndereco($enderecoData);

            if($endereco){
                $aluno->enderecos()->syncWithoutDetaching([$endereco->id]);
            }
        }

        return $aluno;
    }

}
