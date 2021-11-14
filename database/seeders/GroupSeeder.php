<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;


class GroupSeeder extends Seeder
{
    public function run():void
    {
        $group1_1 =Group::create([
            "name"  => "1_1",
            "level" => 1 ,
            'group' => 1
        ]);
        $group1_2 =Group::create([
            "name"  => "1_2",
            "level" => 1 ,
            'group' => 2
        ]);
        
        $group1_3 =Group::create([
            "name"  => "1_3",
            "level" => 1 ,
            'group' => 3
        ]);
        $group1_4 =Group::create([
            "name"  => "1_4",
            "level" => 1 ,
            'group' => 4
        ]);
        $group1_5 =Group::create([
            "name"  => "1_5",
            "level" => 1 ,
            'group' => 5
        ]);
        $group1_6 =Group::create([
            "name"  => "1_6",
            "level" => 1 ,
            'group' => 6
        ]);
        $group1_7 =Group::create([
            "name"  => "1_7",
            "level" => 1 ,
            'group' => 7
        ]);
        $group1_8 =Group::create([
            "name"  => "1_8",
            "level" => 1 ,
            'group' => 8
        ]);
        $group2_1 =Group::create([
            "name"  => "2_1",
            "level" => 2,
            'group' => 1
        ]);
        $group2_2 =Group::create([
            "name"  => "2_2",
            "level" => 2 ,
            'group' => 2
        ]);
        $group2_3 =Group::create([
            "name"  => "2_3",
            "level" => 2 ,
            'group' => 3
        ]);
        $group2_4 =Group::create([
            "name"  => "2_4",
            "level" => 2 ,
            'group' => 4
        ]);
        $group3_1 =Group::create([
            "name"  => "3_1",
            "level" => 3 ,
            'group' => 1
        ]);
        $group3_2 =Group::create([
            "name"  => "3_2",
            "level" => 3 ,
            'group' => 2
        ]);
        $group4_1 =Group::create([
            "name"  => "4_1",
            "level" =>4 ,
            'group' => 1
        ]);
    }
}
