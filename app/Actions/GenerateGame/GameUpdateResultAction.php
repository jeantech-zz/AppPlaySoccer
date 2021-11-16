<?php
namespace App\Actions\GenerateGame;

use App\Models\Game;

class GameUpdateResultAction
{
    public static function execute(array $data, $id): void
    {
        $teamgroup = Game::find($id);
        $teamgroup->wins = $data['wins'];
        $teamgroup->losses =  $data['losses'];
        $teamgroup->draws =  $data['draws'];
        $teamgroup->status =  $data['status'];

        $teamgroup->save();
    }
}
