<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    public function definition(): array
    {
        $country=$this->faker->country();
        return [
            'name' =>  $country,
            'country' =>   $country,
            'image' =>  $this->faker->imageUrl(400, 240),
        ];
    }
}
