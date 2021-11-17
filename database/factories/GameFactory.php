<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'team_groups_id_A' =>  $this->faker->randomElement([1, 2, 3, 4 ]),
            'team_groups_id_B' =>  $this->faker->randomElement([1, 2, 3, 4 ]),
            'wins' =>  $this->faker->randomElement([1, 2, 3, 4 ]),
            'losses' =>  $this->faker->randomElement([1, 2, 3, 4 ]),
            'status' =>  $this->faker->randomElement(["jugado","programado"]),
        ];
    }
}
