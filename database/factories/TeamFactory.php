<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TeamFactory extends Factory
{
    protected $model = Team::class;

    public function definition()
    {
        $country=$this->faker->country();
        return [
			'name' =>  $country,
            'country' =>   $country,
            'image' =>  $this->faker->imageUrl(400, 240),
        ];
    }
}
