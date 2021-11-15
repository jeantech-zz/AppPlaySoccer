<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Values\GenerationGroupValues;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class TeamGroupController extends Controller
{
    
    public function store(Request $request): JsonResponse
    {
        $strategyClass = GenerationGroupValues::STRATEGY[$request->level];
        $strategy = new $strategyClass;
       // $levelis= $strategy->getLevel($request->teams);
       $levelis= $strategy->getLevel();

        return response()->json(['data'=>$levelis]);
       // return response()->json(['data'=>$levelis], Response::HTTP_CREATED);
    }

}
