<?php

namespace Tests\Feature;

use App\Models\User;
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
        $response = $this->actingAs($user)->postJson('/api/teamgroup',
        [
            "level" =>  "levelOne",
            "teams" =>  [1, 2, 3],
        ]);
       // $response->dump();
        $response->assertOk();
        $response->assertSee('EsteNivelOne');
       // $response->assertStatus(Response::HTTP_CREATED);
       
    }
}
