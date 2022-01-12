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
            'file_uri'  => 'var/www/public/' . rand(145672, 9999445332) . '.' . $this->faker->fileExtension(),
            'file_name' => $this->faker->sentence(),
        ];
    }
}
