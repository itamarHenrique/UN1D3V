<?php

namespace App\Models;

use App\Http\Requests\createTeamRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Team extends Model
{
    use HasFactory;

    private $path = "db/teams.txt";

    public function getAll()
    {
        $teams = Storage::get($this->path);
        return json_decode($teams, true);
    }

    public function getById($id)
    {
        $teamsCollection = collect($this->getAll());

        return $teamsCollection->where("id", $id);
    }

    public function createTeam(createTeamRequest $request)
    {
        $teams = $this->getAll();

        $teams[] = $request->validated();


        if (Storage::put($this->path, json_encode($teams))) {
            return $request->valideted();
        }

        return false;
    }




    public function getWithoutPlayers(){
        $teams = collect($this->getAll());

        return $teams->where("players", "==", null);
    }

    public function updateTeam($id, $updatedTeam)
{
    $teams = collect($this->getAll());


    foreach($teams as $key => $team){
        if($team['id'] == $id){
            $teams[$key] = array_merge($team, $updatedTeam);
            Log::info("Dados do team: ", ['dados' => $team]);
            Storage::put($this->path, json_encode($teams));
            Log::info('Dados recebidos do array:', ['key' => $teams[$key]]);

            return $team;

        }
    }

    return false;
}

public function deleteTeam($id){
    $teams = collect($this->getAll());

    $team = $teams->search(fn($team) => $team['id'] == $id);

    if($team !== false){
        $teams->forget($team);

        Storage::put($this->path, json_encode($teams));
        return true;
    }

    return false;
}




}
