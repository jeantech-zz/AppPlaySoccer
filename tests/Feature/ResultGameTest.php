<?php

namespace Tests\Feature;

use App\Models\Game;
use App\Models\Group;
use App\Models\Team;
use App\Models\TeamGroup;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResultGameTest extends TestCase
{
    use RefreshDatabase;

   public function testItCanResultGame():void
    {
        $user=User::factory()->create();        
        $teams=Team::factory()->count(16)->create();
        $groups=$this->groupDataFactory();
        $teamGroup=$this->teamGroupDataFactory();
        $game=$this->gameDataFactory();
        $response = $this->actingAs($user)->postJson('/api/resultgame',[
            "level" =>  "levelOne",
        ]);

        $response->assertOk();

    }


    public function testItCreateCanResultGame():void
    {
        $user=User::factory()->create();        
        $teams=Team::factory()->count(16)->create();
        $groups=$this->groupDataFactory();
        $teamGroup=$this->teamGroupDataFactory();
        $game=$this->gameDataFactory();
        
        $response = $this->actingAs($user)->postJson('/api/resultgame',[
            "level" =>  "levelOne",
        ]);

        $response->assertOk();
       // $response->dump();
        //$response->assertSee('RestultadoGame');

    }

    public function groupDataFactory(): void
    {
        $group1_1 =Group::factory()->create([
            "name"  => "1_1",
            "level" => 1 ,
            'group' => 1
        ]);
        $group1_2 =Group::factory()->create([
            "name"  => "1_2",
            "level" => 1 ,
            'group' => 2
        ]);        
        $group1_3 =Group::factory()->create([
            "name"  => "1_3",
            "level" => 1 ,
            'group' => 3
        ]);
        $group1_4 =Group::factory()->create([
            "name"  => "1_4",
            "level" => 1 ,
            'group' => 4
        ]);
        $group1_5 =Group::factory()->create([
            "name"  => "1_5",
            "level" => 1 ,
            'group' => 5
        ]);
        $group1_6 =Group::factory()->create([
            "name"  => "1_6",
            "level" => 1 ,
            'group' => 6
        ]);
        $group1_7 = Group::factory()->create([
            "name"  => "1_7",
            "level" => 1 ,
            'group' => 7
        ]);
        $group1_8 =Group::factory()->create([
            "name"  => "1_8",
            "level" => 1 ,
            'group' => 8
        ]);

    }

    public function teamGroupDataFactory(): void
    {
        $teamGroup=TeamGroup::factory()->create([
            "group_id"  => 1,
            "team_id" => 1 
        ]);
        $teamGroup=TeamGroup::factory()->create([
            "group_id"  => 1,
            "team_id" => 2 
        ]);
        $teamGroup=TeamGroup::factory()->create([
            "group_id"  => 1,
            "team_id" => 3 
        ]);
        $teamGroup=TeamGroup::factory()->create([
            "group_id"  => 1,
            "team_id" => 4 
        ]);
    }

    public function gameDataFactory(): void
    {
        $teamGroup=Game::factory()->create([
            "team_groups_id_A"  => 1,
            "team_groups_id_B" => 2,
            "status" => "JuegoCreadoVs" 
        ]);

        $teamGroup=Game::factory()->create([
            "team_groups_id_A"  => 3,
            "team_groups_id_B" => 4 ,
            "status" => "JuegoCreadoVs" 
        ]);
    }
}
