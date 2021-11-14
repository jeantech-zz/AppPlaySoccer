<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
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
