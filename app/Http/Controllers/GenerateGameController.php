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

        $teamLevelTwo=$this->gameRepositories->teamLevel(1);

        if (isset( $teamLevelTwo)){
            $strategyClassLevelTwo = GenerationGroupValues::STRATEGY['levelTwo'];
            $strategyLeveTwo = new $strategyClassLevelTwo;
            $generateTeamTwo=$strategyLeveTwo->generateTeamGroupLevel();
            $generateGameTwo=$strategyLeveTwo->generateGameLevel();
            $generateRestultGameLevelTwo=$strategyLeveTwo->generateRestultGameLevel();

            $teamLevelThree=$this->gameRepositories->teamLevel(2);

            if (isset( $teamLevelThree)){
                $strategyClassLevelThree = GenerationGroupValues::STRATEGY['levelThree'];
                $strategyLeveThree = new $strategyClassLevelThree;
                $generateTeamThree=$strategyLeveThree->generateTeamGroupLevel();
                $generateGameThree=$strategyLeveThree->generateGameLevel();
                $generateRestultGameLevelThree=$strategyLeveThree->generateRestultGameLevel();

                $teamLevelFour=$this->gameRepositories->teamLevel(3);
                if (isset( $teamLevelFour)){
                    $strategyClassLevelFour = GenerationGroupValues::STRATEGY['levelFour'];
                    $strategyLeveFour = new $strategyClassLevelFour;
                    $generateTeamFour=$strategyLeveFour->generateTeamGroupLevel();
                    $generateGameFour=$strategyLeveFour->generateGameLevel();
                    $generateRestultGameLevelFour=$strategyLeveFour->generateRestultGameLevel();
                }
            }
        }

        $teamGroup = $this->teamGroupRepositories->all();
        $games = $this->gameRepositories->all();
        $resultGames = $this->resultGameRepositories->all();
        $teamNewLevel=$this->gameRepositories->teamLevel(1);

       
        $teamGroup2 = $this->teamGroupRepositories->teamGroupLevel(2);
        $gamestwo = $this->gameRepositories->gameLevel(2);
        $teamLevelThree=$this->gameRepositories->teamLevel(2);

       
        $teamGroupThree = $this->teamGroupRepositories->teamGroupLevel(3);
        $gamesThree = $this->gameRepositories->gameLevel(3);
        $teamLevelFour=$this->gameRepositories->teamLevel(3);

        
        $teamGroupFour = $this->teamGroupRepositories->teamGroupLevel(4);
        $gamesFour = $this->gameRepositories->gameLevel(4);
        $teamLevelFive=$this->gameRepositories->teamLevel(5);

//"generateTeamFour" => $generateTeamFour, 

        return response()->json(['data' =>  [
            "teamGroupOne" =>  $teamGroup,
            "gamesOne" =>  $games,
            "resultGamesOne" =>  $resultGames,
            "teamLevelTwo" => $teamLevelTwo,
            "teamGroupTwo" => $teamGroup2,
            "gamestwo" => $gamestwo,
            "teamLevelThree" => $teamLevelThree,
            "teamGroupThree" => $teamGroupThree,
            "gamesThree" => $gamesThree,
            "teamLevelFour" => $teamLevelFour,
            "teamGroupFour" => $teamGroupFour,           
            "gamesFour" => $gamesFour
        ]]);
    }
}
