<?php
namespace App\Actions\GenerateGame;

use App\Models\Game;

class GameUpdateAction
{
    public static function execute(array $data, $id): void
    {
        $game = Game::find($id);
        $game->team_groups_id_B =  $data['team_groups_id_B'];
        $game->status =  $data['status'];

        $game->save();
    }
}
