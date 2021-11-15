<?php

namespace Tests\Feature;

use App\Models\Team;
use App\Models\User;
use App\Models\Group;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class TeamGroupTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanGroupteam():void
    {
        $user=User::factory()->create();
        $response = $this->actingAs($user)->postJson('/api/teamgroup',[
            "level" =>  "levelOne",
        ]);
        $response->assertOk();
    }

    public function testItCreateCanGroupteam():void
    {
        $user=User::factory()->create();
        $groups=$this->groupDataFactory();
        $teams=Team::factory()->count(15)->create();
        
        $response = $this->actingAs($user)->postJson('/api/teamgroup',
        [
            "level" =>  "levelOne"
        ]);
      //  $response->dump();
        $response->assertOk();
       // $response->assertSee('EsteNivelOne');
       // $response->assertStatus(Response::HTTP_CREATED);
       
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
}
