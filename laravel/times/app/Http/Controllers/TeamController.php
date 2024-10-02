<?php

namespace App\Http\Controllers;

use App\Http\Requests\createTeamRequest;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

    public function createTeam(createTeamRequest $request)
    {
        // $this->team->createTeam($this->request->all());

        $teams = $this->team->getAll();

        $data = array_merge($request->validated(), ['registration_date' => Carbon::now()->format('Y-m-d h:i:s')]);
        $teams[] = $data;

        if(Storage::put('db/teams.txt', json_encode($teams))){
            return response(["message" => "Registro gravado com sucesso!"], 201);
        }

        return response()->json(["message" => "Erro ao gravar time."], 500);


    }

    public function getWithoutPlayers(){
        return $this->team->getWithoutPlayers();
    }

    public function updateTeam($id)
{
    try {
        $data = $this->request->all();
        $team = $this->team->updateTeam($id, $data);

        if (!$team) {
            return response()->json(["message" => "Time não encontrado."], 404);
        }

        return response()->json([
            "message" => "Time atualizado com sucesso!",
            "data" => $team
        ], 200);
    } catch (\Exception $e) {
        return response()->json(["error" => "Erro ao atualizar o time: " . $e->getMessage()], 500);
    }
}


}
