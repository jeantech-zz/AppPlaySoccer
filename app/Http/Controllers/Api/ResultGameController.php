<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Values\GenerationGroupValues;
use App\Repositories\ResultGameRepositories;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ResultGameController extends Controller
{
    private $resultGameRepositories;

    public function __construct(ResultGameRepositories $resultGameRepositories){
        $this->resultGameRepositories = $resultGameRepositories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $strategyClass = GenerationGroupValues::STRATEGY[$request->level];
        $strategy = new $strategyClass;
        $levelis=$strategy->generateRestultGameLevel();
        $resultGames = $this->resultGameRepositories->all();
       // $games = $this->gameRepositories->gameLevel(1);
        //return "RestultadoGame";
        return response()->json(['data' =>  $resultGames ]);
    }

}
