<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PlayerFactory extends Factory
{
    protected $model = Player::class;

    public function definition()
    {
		return [
			'name' => $this->faker->name(),
			'nationality' =>  $this->faker->country(),
			'age' => $this->faker->numberBetween($min = 1, $max = 30),
			'position' => $this->faker->randomElement([
				"Libero",
				"Central",
				"Lateral",
				"Carrilero",
				"Pivote",
				"interior",
				"Volante",
				"MediaPunta",
				"DelanteroCentro",
				"Extremo",
				"SegundoDelantero",
				]),
			'shirt_number' => $this->faker->numberBetween($min = 1, $max = 20),
			'image' =>  $this->faker->imageUrl(400, 240),
			'team_id' => $this->faker->numberBetween($min = 1, $max = 8),
		];
    }
}
