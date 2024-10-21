<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    private $hospital;

    public function __construct(Hospital $hospital){
        $this->hospital = $hospital;
    }

    public function index(Request $request)
    {
        $hospital = $this->hospital->all();

        return Hospital
    }

    public function show(){
        return $hospital;
    }
}
