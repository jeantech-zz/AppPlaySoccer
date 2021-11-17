<?php

namespace App\Http\Controllers;

use App\Values\GenerationGroupValues;
use App\Repositories\GameRepositories;
use App\Repositories\GroupRepositories;
use App\Repositories\ResultGameRepositories;
use App\Repositories\TeamRepositories;
use App\Repositories\TeamGroupRepositories;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;



class GenerateGameController extends Controller
{
    private GameRepositories $gameRepositories;
    private GroupRepositories $groupRepositories;    
    private TeamGroupRepositories $teamGroupRepositories;
    private TeamRepositories $teamRepositories;
    private ResultGameRepositories $resultGameRepositories;

    public function __construct(){
        $this->teamRepositories = new TeamRepositories ;
        $this->groupRepositories = new GroupRepositories;
        $this->teamGroupRepositories = new TeamGroupRepositories;
        $this->gameRepositories = new GameRepositories;
        $this->resultGameRepositories = new ResultGameRepositories;
    }


    public function generate (Request $request){

        $strategyClass = GenerationGroupValues::STRATEGY[$request->level];
        $strategy = new $strategyClass;
        $refreshGame=$strategy->refreshGenerateGame();
        $generateTeam=$strategy->generateTeamGroupLevel();
        $generateGame=$strategy->generateGameLevel();
        $generateRestultGameLevel=$strategy->generateRestultGameLevel();
        $teamGroup = $this->teamGroupRepositories->all();
        $games = $this->gameRepositories->all();
        $resultGames = $this->resultGameRepositories->all();
        $teamNewLevel=$this->gameRepositories->teamLevel(1);

        $strategyClassLevelTwo = GenerationGroupValues::STRATEGY['levelInterMedium'];
        $strategyLeveTwo = new $strategyClassLevelTwo;
        $generateTeamTwo=$strategyLeveTwo->generateTeamGroupLevel();
        $generateGameTwo=$strategyLeveTwo->generateGameLevel();
        $generateRestultGameLevelTwo=$strategyLeveTwo->generateRestultGameLevel();
        $teamGroup2 = $this->teamGroupRepositories->teamGroupLevel(2);
        $gamestwo = $this->gameRepositories->gameLevel(2);
        $teamLevelThree=$this->gameRepositories->teamLevel(2);

        return response()->json(['data' =>  [
            "team_group" =>  $teamGroup,
            "games" =>  $games,
            "resultGames" =>  $resultGames,
            "teamNewLevel" => $teamNewLevel,
            "teamGroup2" => $teamGroup2,
            "gamestwo" => $gamestwo,
            "teamLevelThree" => $teamLevelThree
        ]]);
    }
}
