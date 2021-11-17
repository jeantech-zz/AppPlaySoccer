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
}