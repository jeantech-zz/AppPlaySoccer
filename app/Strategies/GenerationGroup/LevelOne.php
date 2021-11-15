<?php

namespace App\Strategies\GenerationGroup;

use App\Actions\TeamGroup\TeamGroupAction;
use App\Repositories\GroupRepositories;
use App\Repositories\TeamRepositories;
use App\Strategies\GenerationGroupInterface;


class LevelOne  implements GenerationGroupInterface {

    private TeamRepositories $teamRepositories;
    private GroupRepositories $groupRepositories;

   // public function __construct(TeamRepositories $teamRepositories, GroupRepositories $groupRepositories){
    public function __construct(){
        $this->teamRepositories = new TeamRepositories ;
        $this->groupRepositories = new GroupRepositories;
    }

    public function getLevel() 
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
}