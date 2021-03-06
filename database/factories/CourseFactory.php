<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'file_uri'  => 'courses/SDD_014_0055.pdf',
            'file_name' => $this->faker->sentence(),
        ];
    }
}
