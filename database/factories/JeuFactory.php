<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JeuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description'   => $this->faker->paragraphs(3, true),
            'starting_date' => now(),
            'link'          => 'https://www.chess.com/fr/play/computer',
        ];
    }
}
