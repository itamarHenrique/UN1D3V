<?php

namespace App\Models;

use App\Http\Requests\createTeamRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    $team = $teams->firstWhere('id', $id);

    if (!$team) {
        return false;
    }


    $team = array_merge($team, $updatedTeam);

    $teams = $teams->reject(function ($team) use ($id){
        return $team['id'] === $id;
    })->push($team);


        if(Storage::put($this->path, json_encode($teams))){
            return $team;
        };


    return false;
}

public function deleteTeam($id){
    $teams = collect($this->getAll());

    $team = $teams->Where('id', $id)->delete();

    if(isset($team)){
        unset($team);
        return true;
    }

    return false;
}




}
