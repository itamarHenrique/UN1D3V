<?php

namespace App\Models;

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

        return json_decode($teams);
    }

    public function getById($id)
    {
        $teamsCollection = collect($this->getAll());

        return $teamsCollection
            ->where("id", $id)
            ->first();
    }

    public function createTeam($team)
    {
        $teams = $this->getAll();
        $teams[] = $team;

        Storage::put($this->path, json_encode($teams));
    }

    public function updateTeam($id, $team){
        $teams = $this->getAll();
        $teams[] = $team;
    }

    public function getWithoutPlayers(){
        $teams = collect($this->getAll());

        return $teams->where("players", "==", null);
    }
}
