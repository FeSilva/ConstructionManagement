<?php

namespace App\Models\Usuarios;

use App\Models\User;

class UsuariosRepository
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getUserTeam()
    {
        $users = $this->model->with("team")->get();
        foreach ($users as $key => $user)
        {
            $team = $this->currenteNameTeam($user->team, $user);
            $data['data'][] = [
                'id' => $user->id,
                'full_name' => $user->name,
                'email' => $user->email,
                'team' => $team,
                'avatar' => $user->profile_photo_path
            ];
        }
        return json_encode($data, true);
    }

    private function currenteNameTeam($teams, $user)
    {
        foreach($teams as $team) {
            if ($team->id == $user->current_team_id)
                $team_name = $team->name;
        }
        return $team_name;
    }
}
