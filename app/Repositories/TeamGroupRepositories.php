<?php
namespace App\Repositories;

use App\Models\TeamGroup;

class TeamGroupRepositories{
    private $model;

    public function __construct()
    {
        $this->model = new TeamGroup ();
    }

    public function all(){
       return  $this->model->get();
    }
}