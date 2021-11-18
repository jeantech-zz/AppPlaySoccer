<?php
namespace App\Repositories;

use App\Models\Game;
use Illuminate\Support\Facades\DB;

class GameRepositories{
    private $model;

    public function __construct()
    {
        $this->model = new Game();
    }

    public function all() 
    {
       return  $this->model->get();
    }

    public function gameLevel($level) 
    {
        return  $this->model
        ->join('team_groups', 'team_groups.id', '=', 'games.team_groups_id_A')
        ->join('groups', 'groups.id', '=', 'team_groups.group_id')
        ->where('groups.level','=',$level)
        ->select('games.*','games.id AS games_id','groups.level','games.team_groups_id_A','games.team_groups_id_B')
        ->get();

     }

     public function deleteAll(){
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        return  $this->model->truncate();
     }

     public function teamLevel($level){
        return  $this->model
        ->join('team_groups', 'team_groups.id', '=', 'games.wins' )
        ->join('result_games', 'result_games.team_group_id', '=', 'games.wins')
        ->join('groups', 'groups.id', '=', 'team_groups.group_id')
        ->join('teams', 'teams.id', '=', 'team_groups.team_id')
        ->select('teams.*','games.wins','result_games.goals_for', 'groups.id AS groups_id')
        ->where('groups.level','=',$level)
        ->orderBy('groups.id')
        ->orderBy('result_games.goals_for','desc')
        ->get();
    }

    public function teamLevelLosses(){
        return  $this->model
        ->join('team_groups', 'team_groups.id', '=', 'games.losses' )
        ->join('result_games', 'result_games.team_group_id', '=', 'games.losses')
        ->join('groups', 'groups.id', '=', 'team_groups.group_id')
        ->join('teams', 'teams.id', '=', 'team_groups.team_id')
        ->select('teams.name AS team_name','teams.country AS team_country','games.id AS game_id', 'groups.level AS groups_level')
        ->orderBy('groups.id')
        ->orderBy('result_games.goals_against','desc')
        ->paginate(10);
    }
    

}