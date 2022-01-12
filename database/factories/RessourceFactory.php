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
            'title'         => $this->faker->sentence(),
            'type'          => $this->faker->randomElement([
                'Activité',
                'Jeu en ligne',
                'Vidéo',
                'Photo',
                'Atelier',
                'Cours',
                'Fiche de lecture',
                'Défi',
                'Article',
                ]),
            'relation'      => $this->faker->randomElement([
                'Soi',
                'Conjoints',
                'Famille',
                'Professionnelle',
                'Amis et communautés',
                'Inconnus'
                ]),
            'user_id'       => rand(1, 10),
            'categorie_id'  => rand(1, 8),
            'status'        => $this->faker->randomElement([
                'draft',
                'pending',
                'published',
                'deleted',
                ]),
            'restriction'   => $this->faker->randomElement([
                'public',
                'private',
                ]),
            'content'       => rand(1, 3),
        ];
    }
}
