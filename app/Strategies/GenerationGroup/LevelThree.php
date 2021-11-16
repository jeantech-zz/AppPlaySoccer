<?php
namespace App\Strategies\GenerationGroup;

class LevelLast  implements GenerationGroupInterface {

    public function generateTeamGroupLevel(){
        return 'EsteNivelLast';
    }
}