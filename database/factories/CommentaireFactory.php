<?php

namespace Database\Factories;

// use App\Enums\CommentaireStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content'       => $this->faker->sentence(),
            'user_id'       => rand(1, 10),
            'ressource_id'  => 1,
            // 'status'        => CommentaireStatus::Published->value,
            'reports'       => $this->faker->randomElement([
                0,
                0,
                0,
                0,
                0,
                0,
                0,
                1,
                2,
                3,
                10,
                ]),
            'replies_to'    => $this->faker->randomElement([
                null,
                null,
                null,
                null,
                null,
                1
                ]),
        ];
    }
}
