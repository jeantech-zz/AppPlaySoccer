<?php
namespace App\Repositories;

use App\Models\ResultGame;

class ResultGameRepositories{
    private $model;

    public function __construct()
    {
        $this->model = new ResultGame ();
    }

    public function all(){
       return  $this->model->get();
    }
}