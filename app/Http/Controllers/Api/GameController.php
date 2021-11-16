<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Values\GenerationGroupValues;
use App\Repositories\TeamGroupRepositories;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GameController extends Controller
{
    private $teamGroupRepositories;

    public function __construct(TeamGroupRepositories $teamGroupRepositories){
        $this->teamGroupRepositories = $teamGroupRepositories;
    }
    
    public function store(Request $request): JsonResponse
    {
        $strategyClass = GenerationGroupValues::STRATEGY[$request->level];
        $strategy = new $strategyClass;
        $levelis=$strategy->generateGameLevel();
       // return "ingrese a Game";
        return response()->json(['data' =>  $levelis ]);
    }

}
