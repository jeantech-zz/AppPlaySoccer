<?php
namespace App\Repositories;

use App\Models\Team;

class TeamRepositories{
    private $model;

    public function __construct()
    {
        $this->model = new Team ();
    }

    public function all(){
       return  $this->model->get();
       //return  $this->model->first();
    }

    
}