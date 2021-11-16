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

}