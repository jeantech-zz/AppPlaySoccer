<?php
namespace App\Repositories;

use App\Models\Game;

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
        ->leftjoin('team_groups', 'team_groups.id', '=', 'games.team_groups_id_A')
        ->leftjoin('groups', 'groups.id', '=', 'team_groups.group_id')
        ->where('groups.level','=',$level)
        ->select('games.*','games.id AS games_id','groups.level','games.team_groups_id_A','games.team_groups_id_B')
        ->get();

     }

}