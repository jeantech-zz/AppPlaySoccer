<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' =>   $this->faker->unique()->name(),
            'level' =>  $this->faker->randomElement([1, 2, 3, 4 ]),
            'group' =>  $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8]),
        ];
    }
}
