<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeamGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'group_id' =>  $this->faker->randomElement([1, 2, 3, 4 ]),
            'team_id' =>  $this->faker->randomElement([1, 2, 3, 4 ]),
        ];
    }
}
