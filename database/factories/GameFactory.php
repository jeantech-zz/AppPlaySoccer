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
            'ganador' =>  $this->faker->randomElement([1, 2, 3, 4 ]),
            'perdedor' =>  $this->faker->randomElement([1, 2, 3, 4 ]),
            'empate' =>  $this->faker->randomElement(["true","false" ]),
            'status' =>  $this->faker->randomElement(["jugado","programado"]),
        ];
    }
}
