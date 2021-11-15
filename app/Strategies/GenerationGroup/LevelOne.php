<?php

namespace App\Strategies\GenerationGroup;

use App\Strategies\GenerationGroupInterface;

class LevelOne  implements GenerationGroupInterface {

    public function getLevel(){
        return 'EsteNivelOne';
    }
}