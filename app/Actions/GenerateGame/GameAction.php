<?php
namespace App\Actions\GenerateGame;

use App\Models\Game;

class GameAction
{
    public static function execute(array $data)
    {
        $teamgroup = new Game();
        return  $teamgroup->create([
            "team_groups_id_A" =>  $data['team_groups_id_A'],
            "team_groups_id_B" =>  null,
            "ganador" =>  null,
            "perdedor" =>   null,
            "empate" =>   null,
            'status' =>  $data['status'],
        
        ]);
    }
}
