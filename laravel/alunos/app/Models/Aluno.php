<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;


    protected $fillable = ['nome_aluno', 'RA','email','unidade_de_ensino'];

    protected $aluno = 'aluno';

    public function getAll()
    {
        return Aluno::all();
    }

    public function getById($id)
    {
        return Aluno::findOrFail($id);
    }
}
