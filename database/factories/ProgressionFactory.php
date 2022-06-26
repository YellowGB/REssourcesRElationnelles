<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProgressionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'       => rand(1, 400),
            'ressource_id'  => rand(1, 900),
            'is_favorite'   => $this->faker->boolean(),
            'is_used'       => $this->faker->boolean(),
            'is_saved'      => $this->faker->boolean(),
        ];
    }
}
