<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'file_uri'      => rand(145672, 9999445332) . '.jpg',
            'photo_author'  => $this->faker->name(),
            'legend'        => $this->faker->sentence(),
        ];
    }
}
