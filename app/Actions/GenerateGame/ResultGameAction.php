<?php
namespace App\Actions\GenerateGame;

use App\Models\ResultGame;

class ResultGameAction
{
    public static function execute(array $data)
    {
        $teamgroup = new ResultGame();
        return  $teamgroup->create([
            "game_id" =>  $data['game_id'],
            "team_group_id" =>  $data['team_group_id'],
            "goals_for" =>  $data['goals_for'],
            "goals_against" =>   $data['goals_against'],
            "yellow_cards" =>   $data['yellow_cards'],
            'red_cards' =>  $data['red_cards'],
        ]);
    }
}