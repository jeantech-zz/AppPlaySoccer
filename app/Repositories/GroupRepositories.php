<?php
namespace App\Repositories;

use App\Models\Group;

class GroupRepositories{
    private $model;

    public function __construct()
    {
        $this->model = new Group ();
    }

    public function groupLevel( $level,  $group){
       return  $this->model->where('level','=',$level)
       ->where('group','=',$group)
       ->first();
    }
}