<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = ['rua', 'cep', 'numero_da_casa', 'bairro'];

    protected $endereco = 'enderecos';

    public function alunos()
    {
        return $this->belongsToMany(Aluno::class, 'aluno_endereco', 'endereco_id', 'aluno_id')
            ->withTimestamps();
    }

}
