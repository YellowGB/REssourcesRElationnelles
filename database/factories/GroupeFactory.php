<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GroupeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'          => $this->faker->words(3),
            'user_id'       => rand(1, 10),
            'invitations'   => $this->faker->boolean(),
            'ressource_id'  => null,
        ];
    }
}
