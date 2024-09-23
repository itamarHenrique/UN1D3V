<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    private $alunos;

    public function __construct()
    {
        $this->alunos = [
            ["nome" => "Elder", "nota" => 10],
            ["nome" => "Andrei", "nota" => 3],
            ["nome" => "Michel", "nota" => 2],
            ["Nome" => "Henrique", "nota" => 5],
            ["Nome" => "Pablo", "nota" => 9]
        ];
    }

    public function obterAlunos($filtro = null){

        if(empty($filtro)){
            return $this->alunos;
        }

            $alunosCollection = collect($this->alunos);

            $resultado = $alunosCollection->where("nome", $filtro)->first();

            return $resultado;




    }

    public function obterAlunosAprovados(){
        $alunos = collect($this->obterAlunos());

        return $alunos->where("nota", ">", 7);
    }

}
