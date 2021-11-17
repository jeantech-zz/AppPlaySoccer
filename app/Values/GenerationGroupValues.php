<?php
namespace App\Values;

use App\Strategies\GenerationGroup\levelInterMedium;
use App\Strategies\GenerationGroup\levelLast;
use App\Strategies\GenerationGroup\LevelOne;

final class GenerationGroupValues {

    public const STRATEGY =  [
        "levelOne" => LevelOne::class,
        "LevelTwo" => LevelTwo::class,
        "LevelThree" => LevelThree::class,
        "LevelFour" => LevelFour::class,
    ];
    
    public const variable = '/dashboard';
}