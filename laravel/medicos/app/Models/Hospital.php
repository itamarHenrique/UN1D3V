<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{

    use HasFactory;

    protected $fillable = [
        "medico_id",
        "hospital"
    ];

    protected $table = "hospital";

    public function hospital(){
        return $this->hasMany(Medico::class, 'hospital_id');
    }

    public function especialidade()
    {
        return $this->belongsTo(Especialidade::class);
    }
}
