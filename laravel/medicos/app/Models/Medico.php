<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = [
        "hospital_id",
        "especialidade_id",
        "nome",
    ];

    protected $table = "medico";


    public function medico()
    {
        return $this->belongsTo(Hospital::class);
    }

}
