<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Values\GenerationGroupValues;
use App\Repositories\GameRepositories;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GameController extends Controller
{
    private $gameRepositories;

    public function __construct(GameRepositories $gameRepositories){
        $this->gameRepositories = $gameRepositories;
    }
    
    public function store(Request $request): JsonResponse
    {
        $strategyClass = GenerationGroupValues::STRATEGY[$request->level];
        $strategy = new $strategyClass;
        $levelis=$strategy->generateGameLevel();
        $games = $this->gameRepositories->all();
       // return "ingrese a Game";
        return response()->json(['data' =>  $games ]);
    }

}
