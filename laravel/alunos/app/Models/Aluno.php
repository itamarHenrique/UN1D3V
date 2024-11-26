<?php

namespace App\Models;

use App\Http\Requests\AlunoPostRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;


    protected $fillable = ['primeiro_nome', 'sobrenome', 'RA','email','unidade_de_ensino'];

    protected $aluno = 'aluno';

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
        return Aluno::create([
            'primeiro_nome' => $data['primeiro_nome'],
            'sobrenome' => $data['sobrenome'],
            'RA' => $data['RA'],
            'email' => $data['email'],
            'unidade_de_ensino' => $data['unidade_de_ensino']
        ]);
    }
}
