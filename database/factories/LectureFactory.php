<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LectureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'     => $this->faker->sentence(),
            'author'    => $this->faker->name(),
            'year'      => $this->faker->year(),
            'summary'   => $this->faker->paragraphs(4, true),
            'analysis'  => $this->faker->paragraphs(6, true),
            'review'    => $this->faker->paragraphs(5, true),
        ];
    }
}
