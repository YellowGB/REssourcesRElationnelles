<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StatistiqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $terms      = 'lorem ipsum dolor sit amet consectetur adipisicing elit illum dolore voluptate officiis aut facere incidunt quidem repellat maxime';
        $termsArray = explode(' ', $terms);
        
        return [
            'search_term'   => $this->faker->unique()->randomElement($termsArray),
            'search_count'  => rand(1, 3000),
        ];
    }
}
