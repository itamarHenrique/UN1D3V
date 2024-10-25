<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        'medico_id',
        'horario'
    ];

    protected $table = 'horario';


    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }
}
