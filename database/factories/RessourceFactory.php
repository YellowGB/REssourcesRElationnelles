<?php

namespace Database\Factories;

use App\Enums\RessourceType;
use App\Enums\RessourceStatus;
use App\Enums\RessourceRelation;
use App\Enums\RessourceRestriction;
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
                RessourceType::Activite->value,
                RessourceType::Article->value,
                RessourceType::Atelier->value,
                RessourceType::Course->value,
                RessourceType::Defi->value,
                RessourceType::Jeu->value,
                RessourceType::Lecture->value,
                RessourceType::Photo->value,
                RessourceType::Video->value,
                ]),
            'ressourceable_id'      => 1,
            'relation'              => $this->faker->randomElement([
                RessourceRelation::Self->value,
                RessourceRelation::Spouse->value,
                RessourceRelation::Family->value,
                RessourceRelation::Pro->value,
                RessourceRelation::Friend->value,
                RessourceRelation::Stranger->value,
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
            'count'                 => rand(0, 500),
        ];
    }
}
