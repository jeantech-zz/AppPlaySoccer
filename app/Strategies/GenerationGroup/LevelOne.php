<?php

namespace App\Strategies\GenerationGroup;

use App\Actions\GenerateGame\TeamGroupAction;
use App\Actions\GenerateGame\GameAction;
use App\Actions\GenerateGame\GenerateCardsAction;
use App\Actions\GenerateGame\GenerateGoalsAction;
use App\Actions\GenerateGame\GameUpdateAction;
use App\Actions\GenerateGame\GameUpdateResultAction;
use App\Actions\GenerateGame\ResultGameAction;
use App\Repositories\GameRepositories;
use App\Repositories\GroupRepositories;
use App\Repositories\TeamRepositories;
use App\Repositories\TeamGroupRepositories;
use App\Repositories\ResultGameRepositories;
use App\Strategies\GenerationGroupInterface;


class LevelOne  implements GenerationGroupInterface {
    
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

    public function generateTeamGroupLevel() :void
    {

        $teams = $this->teamRepositories->all();

        $j=1;
        $i=1;
        $info="";
        $info= $teams;
        foreach($teams as $team => $values){
            $teamId = $values->id;
           
            $group = $this->groupRepositories->groupLevel(1,$i);
            $groupId = $group->id;

            $teamGroup = TeamGroupAction::execute([
                        "group_id" => $groupId ,
                        "team_id" =>  $teamId,
            ]);
                 
            if($j==4){
                $j=1;
                $i++;
            } else{
                $j++;       
            }              
        }
        
        //return 'EsteNivelOne';
    }

    public function generateGameLevel() :void
    {
        $teamgroups = $this->teamGroupRepositories->teamGroupLevel(1);

        $i=1;
        $idGame;

        foreach($teamgroups as $teamgroup => $values){
            $teamGroupId = $values->id;
            if($i==2){  
                $game= GameUpdateAction::execute([
                    "team_groups_id_B" => $teamGroupId ,
                    "status" =>  "JuegoCreadoVs",
                ],  $idGame); 
                $i=1;            
            } else{
                $game= GameAction::execute([
                    "team_groups_id_A" => $teamGroupId ,
                    "status" =>  "JuegoCreado",
                ]);
                $idGame = $game->id;
                $i++;      
            }  
        }
       // return $idGame;
    }

    public function generateRestultGameLevel() :void
    {
        $games = $this->gameRepositories->gameLevel(1);

        foreach($games as $game => $values){

            $redCardsA=GenerateCardsAction::execute();
            $redCardsB=GenerateCardsAction::execute();
            $yellowCardsA=GenerateCardsAction::execute();
            $yellowCardsB=GenerateCardsAction::execute();
            $goalsForA=GenerateGoalsAction::execute();
            $goalsForB=GenerateGoalsAction::execute();
            $games_id=intval($values->games_id );

            $game= ResultGameAction::execute([
                "game_id" => $games_id,
                "team_group_id" => $values->team_groups_id_A,
                "goals_for" => $goalsForA ,
                "goals_against" =>  $goalsForB,
                "yellow_cards" => $yellowCardsA ,
                "red_cards" =>  $redCardsA,
            ]);

            $game= ResultGameAction::execute([
                "game_id" => $games_id ,
                "team_group_id" => $values->team_groups_id_B,
                "goals_for" => $goalsForB ,
                "goals_against" =>  $goalsForA,
                "yellow_cards" => $yellowCardsB ,
                "red_cards" =>  $redCardsB,
            ]);

            if ($goalsForA>$goalsForB){
                $game= GameUpdateResultAction::execute([
                        "wins" => $values->team_groups_id_A,
                        "losses" => $values->team_groups_id_B,
                        "draws" => "false" ,
                        "status" => "Played",
                ], $games_id );
                
            }else if($goalsForB>$goalsForA){
                $game= GameUpdateResultAction::execute([
                        "wins" => $values->team_groups_id_B,
                        "losses" => $values->team_groups_id_A,
                        "draws" => "false",
                        "status" => "Played" ,
                ], $games_id );
            }else if($goalsForB==$goalsForA){
                if (($redCardsA>$redCardsB) && ($yellowCardsA>$yellowCardsB)){ 
                    $game= GameUpdateResultAction::execute([
                        "wins" => $values->team_groups_id_A,
                        "losses" => $values->team_groups_id_B,
                        "draws" => "true",
                        "status" => "Played"  ,
                    ], $games_id );
                }else{
                    $game= GameUpdateResultAction::execute([
                        "wins" => $values->team_groups_id_B,
                        "losses" => $values->team_groups_id_A,
                        "draws" => "true",
                        "status" => "Played"  ,
                    ], $games_id );
                }
            }

        }

    }

    public function refreshGenerateGame (){
        $this->resultGameRepositories->deleteAll();
        $this->gameRepositories->deleteAll();
        $this->teamGroupRepositories->deleteAll();

    }
}
