<?php
namespace App\Actions\GenerateGame;

use App\Models\Game;

class GameUpdateResultAction
{
    public static function execute(array $data, integer $id): void
    {
        $teamgroup = Game::find($id);
        $teamgroup->ganador = $data['ganador'];
        $teamgroup->perdedor =  $data['perdedor'];
        $teamgroup->empate =  $data['empate'];
        $teamgroup->status =  $data['status'];

        $teamgroup->save();
    }
}
