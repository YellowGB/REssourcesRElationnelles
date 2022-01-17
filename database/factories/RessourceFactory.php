<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RessourceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'                 => $this->faker->sentence(),
            'ressourceable_type'    => $this->faker->randomElement([
                'App\Models\Activite',
                'App\Models\Jeu',
                'App\Models\Video',
                'App\Models\Photo',
                'App\Models\Atelier',
                'App\Models\Course',
                'App\Models\Lecture',
                'App\Models\Defi',
                'App\Models\Article',
                ]),
            'ressourceable_id'      => rand(1, 3),
            'relation'              => $this->faker->randomElement([
                'self',
                'spouse',
                'family',
                'pro',
                'friend',
                'stranger',
                ]),
            'user_id'               => rand(1, 10),
            'categorie_id'          => rand(1, 13),
            'status'                => $this->faker->randomElement([
                'draft',
                'pending',
                'published',
                'deleted',
                ]),
            'restriction'           => $this->faker->randomElement([
                'public',
                'private',
                ]),
        ];
    }
}
