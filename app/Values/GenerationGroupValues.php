<?php
namespace App\Values;

use App\Strategies\GenerationGroup\LevelOne;
use App\Strategies\GenerationGroup\LevelTwo;
use App\Strategies\GenerationGroup\LevelThree;
use App\Strategies\GenerationGroup\LevelFour;

final class GenerationGroupValues {

    public const STRATEGY =  [
        "levelOne" => LevelOne::class,
        "levelTwo" => LevelTwo::class,
        "levelThree" => LevelThree::class,
        "levelFour" => LevelFour::class,
    ];
    
    public const variable = '/dashboard';
}