<?php
namespace App\Actions\GenerateGame;

use App\Models\Game;

class GameUpdateAction
{
    public static function execute(array $data, integer $id): void
    {
        $teamgroup = Game::find($id);
        $teamgroup->team_groups_id_B =  $data['team_groups_id_B'];

        $teamgroup->save();
    }
}
