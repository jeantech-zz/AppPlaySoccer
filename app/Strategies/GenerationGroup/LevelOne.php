<?php

namespace App\Strategies\GenerationGroup;

use App\Actions\GenerateGame\TeamGroupAction;
use App\Actions\GenerateGame\GameAction;
use App\Actions\GenerateGame\GameUpdateAction;
use App\Repositories\GroupRepositories;
use App\Repositories\TeamRepositories;
use App\Repositories\TeamGroupRepositories;
use App\Strategies\GenerationGroupInterface;


class LevelOne  implements GenerationGroupInterface {

    private TeamRepositories $teamRepositories;
    private GroupRepositories $groupRepositories;
    private TeamGroupRepositories $teamGroupRepositories;

    public function __construct(){
        $this->teamRepositories = new TeamRepositories ;
        $this->groupRepositories = new GroupRepositories;
        $this->teamGroupRepositories = new TeamGroupRepositories;
        
    }

    public function generateTeamGroupLevel() 
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
        
        return 'EsteNivelOne';
    }

    public function generateGameLevel() 
    {
        $teamgroups = $this->teamGroupRepositories->teamGroupLevel(1);

        $i=1;
        $idGame;
        /*$game= GameAction::execute([
            "team_groups_id_A" => 1 ,
            "status" =>  "JuegoCreado",
        ]);
        $idGame = $game->id;*/

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
}