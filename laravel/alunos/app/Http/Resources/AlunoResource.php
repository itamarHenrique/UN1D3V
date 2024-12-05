<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlunoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome_completo' => "{$this->primeiro_nome} {$this->sobrenome}",
            'primeiro_nome' => $this->primeiro_nome,
            'sobrenome' => $this->sobrenome,
            'endereços' =>$this->enderecos->map(function($endereco) {
                return [
                    'id' => $endereco->id,
                    'nome da rua' => $endereco->rua,
                    'cep' => $endereco->cep,
                    'numero da casa' => $endereco->numero_da_casa,
                    'bairro' => $endereco->bairro
                ];
            }),
            'email' => $this->email,
            'RA' => $this->RA,
            'unidade_de_ensino' => $this->unidade_de_ensino
        ];
    }
}
