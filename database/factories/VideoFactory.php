<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'file_uri'  => '',
            'link'      => $this->faker->url(),
            'legend'    => $this->faker->sentence(),
        ];
    }
}
