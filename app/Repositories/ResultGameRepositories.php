<?php
namespace App\Repositories;

use App\Models\ResultGame;
use Illuminate\Support\Facades\DB;

class ResultGameRepositories{
    private $model;

    public function __construct()
    {
        $this->model = new ResultGame ();
    }

    public function all(){
       return  $this->model->get();
    }

    public function deleteAll(){
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        return  $this->model->truncate();
     }

     public function allOrderBy($keyWord){
        return  $this->model
        ->join('team_groups', 'team_groups.id', '=', 'result_games.team_group_id')
        ->join('teams', 'teams.id', '=', 'team_groups.team_id')
        ->orderBy('result_games.id')
        ->orWhere('game_id', 'LIKE', $keyWord)
        ->orWhere('team_group_id', 'LIKE', $keyWord)
        ->orWhere('goals_for', 'LIKE', $keyWord)
        ->orWhere('goals_against', 'LIKE', $keyWord)
        ->orWhere('yellow_cards', 'LIKE', $keyWord)
        ->orWhere('red_cards', 'LIKE', $keyWord)
        ->select('result_games.*','teams.name AS team_name')
        ->paginate(10);
     }


     public function allResultOrderBy($keyWord){
        return  $this->model
        ->join('team_groups', 'team_groups.id', '=', 'result_games.team_group_id')
        ->join('teams', 'teams.id', '=', 'team_groups.team_id')
        ->join('groups', 'groups.id', '=', 'team_groups.group_id')
        ->select('result_games.*','teams.name AS team_name','teams.country AS team_country', 'groups.level AS groups_level')
        ->orderBy('groups.level', 'desc')
        ->distinct(['teams.name'])
        ->paginate(10);
     }
}