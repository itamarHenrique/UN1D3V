<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $fillable = [
        "paciente_id",
        "horario_id",
        "descricao",
        "status"
    ];

    protected $table = "agendamento";

    public function paciente(){
        return $this->hasMany(Paciente::class, 'paciente_id');
    }

    public function horario(){
        return $this->hasMany(Horario::class, 'horario_id');
    }
}
