<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content'   => $this->faker->sentence(),
            'user_id'   => rand(1, 10),
            'groupe_id' => rand(1, 7),
        ];
    }
}
