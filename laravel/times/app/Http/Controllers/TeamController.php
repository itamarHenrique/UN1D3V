<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    private $team;
    private $request;

    public  function __construct(Team $team, Request $request)
    {
        $this->team = $team;
        $this->request = $request;
    }

    public function getAll()
    {
        return $this->team->getAll();
    }

    public function getById($id)
    {
        $team = $this->team->getById($id);

        if (!$team) {
            return response(["message" => "Registro não encontrado!"], 404);
        }

        return $team;
    }

    public function createTeam()
    {
        $this->team->createTeam($this->request->all());

        return response(["message" => "Registro gravado com sucesso!"], 201);
    }

    public function getWithoutPlayers(){
        return $this->team->getWithoutPlayers();
    }
}