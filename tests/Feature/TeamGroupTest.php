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
        $this->withoutExceptionHandling();
        $user=User::factory()->create();
        $response = $this->actingAs($user)->post('createGroupTeam');

        $response->assertStatus(200);
    }
}
