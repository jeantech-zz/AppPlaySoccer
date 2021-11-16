<?php
namespace App\Actions\GenerateGame;

use App\Models\Game;

class GenerateGoalsAction
{
    public static function execute()
    {
       return  rand(0, 8);
    }
}
