<?php

namespace App\Strategies;

interface GenerationGroupInterface {
    
    public function generateTeamGroupLevel();

    public function generateGameLevel();

    public function generateRestultGameLevel();
    
}