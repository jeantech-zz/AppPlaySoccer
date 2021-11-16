<?php
namespace App\Actions\GenerateGame;

use App\Models\Game;

class GameAction
{
    public static function execute(array $data)
    {
        $teamgroup = new Game();
        $teamgroup->team_groups_id_A = $data['team_groups_id_A'];
      /* $teamgroup->team_groups_id_B = null;
        $teamgroup->ganador = null;
        $teamgroup->perdedor =  null;
        $teamgroup->empate =  null;*/
        $teamgroup->status =  $data['status'];

        return  $teamgroup->save();
    }
}
