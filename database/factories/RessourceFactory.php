<?php

namespace Database\Factories;

use App\Enums\RessourceRestriction;
use App\Enums\RessourceStatus;
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
            'ressourceable_type'    => $this->faker->unique()->randomElement([
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
            'ressourceable_id'      => 1,
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
                RessourceStatus::Draft,
                RessourceStatus::Pending,
                RessourceStatus::Published,
                RessourceStatus::Deleted,
                ]),
            'restriction'           => $this->faker->randomElement([
                RessourceRestriction::Private,
                RessourceRestriction::Public,
                ]),
        ];
    }
}
