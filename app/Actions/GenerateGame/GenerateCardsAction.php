<?php
namespace App\Actions\GenerateGame;

use App\Models\Game;

class GenerateCardsAction
{
    public static function execute()
    {
        return  rand(0, 5);  
    }
}
