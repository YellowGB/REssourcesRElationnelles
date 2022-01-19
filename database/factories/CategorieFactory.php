<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'  => $this->faker->unique()->randomElement([
                'communication',
                'culture',
                'development',
                'emotion',
                'hobby',
                'pro',
                'parent',
                'quality',
                'sense',
                'physical',
                'psychological',
                'spirit',
                'love',
            ]),
        ];
    }
}
