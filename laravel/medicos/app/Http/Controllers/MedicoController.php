<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    private $medico;

    public function __construct(Medico $medico)
    {
        $this->medico = $medico;
    }
}
