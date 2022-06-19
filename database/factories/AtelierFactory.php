<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AtelierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->paragraphs(4, true),
        ];
    }
}
