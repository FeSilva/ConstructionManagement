<?php

namespace App\Models\Usuarios;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsuariosRepository
{
    private $model;

    public function __construct(User $model)
    {
        //$this->model = $model;
    }

    public function getUserTeam()
    {
        $users = User::with("team")->get();
        foreach ($users as $key => $user)
        {
            $team = $this->currenteNameTeam($user->team, $user);
           
            $data['data'][] = [
                'id' => $user->id,
                'full_name' => $user->name,
                'email' => $user->email,
                'observations' => $user->observations,
                'team' => $team,
                'avatar' => $user->profile_photo_path
            ];
        }
        return json_encode($data, true);
    }

    public static function supervisors()
    {
        return User::whereHas("team", function ($query){
            $query->where('teams.id', 2); //id = 2 / Grupo = fiscal
        })->pluck('name','id');
    }
    private function currenteNameTeam($teams, $user)
    {
        foreach($teams as $team) {
            if ($team->id == $user->current_team_id)
                $team_name = $team->name;
        }
        return $team_name;
    }

    public function find($id)
    {
        return User::with("team")->find($id);
    }
}
