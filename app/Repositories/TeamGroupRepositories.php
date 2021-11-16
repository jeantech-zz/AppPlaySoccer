<?php
namespace App\Repositories;

use App\Models\TeamGroup;

class TeamGroupRepositories{
    private $model;

    public function __construct()
    {
        $this->model = new TeamGroup ();
    }

    public function all() 
    {
       return  $this->model->get();
    }

    public function teamGroupLevel($level) 
    {
        return  $this->model
        ->leftjoin('groups', 'groups.id', '=', 'team_groups.group_id')
        ->where('groups.level','=',$level)
        ->select('team_groups.*','groups.level')
        ->get();

     }
}