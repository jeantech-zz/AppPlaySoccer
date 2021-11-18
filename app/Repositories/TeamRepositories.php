<?php
namespace App\Repositories;

use App\Models\Team;
use Illuminate\Support\Facades\DB;

class TeamRepositories{
    private $model;

    public function __construct()
    {
        $this->model = new Team ();
    }

    public function all(){
       return  $this->model->get();
    }

    public function allGameResult(){
        return  $this->model
        ->join('team_groups', 'team_groups.team_id', '=', 'teams.id' )
        ->join('result_games', 'result_games.team_group_id', '=', 'team_groups.id')
        ->join('games', 'games.id', '=', 'result_games.game_id')
        ->selectRaw('teams.name AS team_name, teams.country AS team_country, count(games.wins ) as wins, count(games.losses ) as losses, sum(result_games.goals_for) as goals_for, sum(result_games.yellow_cards) as yellow_cards, sum(result_games.red_cards) as red_cards')
        ->groupBy('teams.name','teams.country')
        ->orderBy('games.id', 'desc')
        ->paginate(10);
    }

    
}