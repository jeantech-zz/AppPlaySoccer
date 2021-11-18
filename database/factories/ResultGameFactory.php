<?php

namespace Database\Factories;

use App\Models\ResultGame;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ResultGameFactory extends Factory
{
    protected $model = ResultGame::class;

    public function definition()
    {
        return [
			'game_id' => $this->faker->name,
			'team_group_id' => $this->faker->name,
			'goals_for' => $this->faker->name,
			'goals_against' => $this->faker->name,
			'yellow_cards' => $this->faker->name,
			'red_cards' => $this->faker->name,
        ];
    }
}
