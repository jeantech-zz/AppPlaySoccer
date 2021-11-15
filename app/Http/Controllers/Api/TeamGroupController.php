<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Values\GenerationGroupValues;
use App\Repositories\TeamGroupRepositories;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TeamGroupController extends Controller
{
    private $teamGroupRepositories;

    public function __construct(TeamGroupRepositories $teamGroupRepositories){
        $this->teamGroupRepositories = $teamGroupRepositories;
    }
    
    public function store(Request $request): JsonResponse
    {
        $strategyClass = GenerationGroupValues::STRATEGY[$request->level];
        $strategy = new $strategyClass;
        $levelis=$strategy->getLevel();
        $teams = $this->teamGroupRepositories->all();

        return response()->json(['data' =>  $teams ]);
    }

}
