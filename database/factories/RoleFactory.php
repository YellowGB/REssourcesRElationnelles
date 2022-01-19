<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'          => $this->faker->unique()->randomElement([
                'citoyen',
                'moderateur',
                'administrateur',
                'superadministrateur',
            ]),
            'permissions'   => '{"can_publish_ressources": "1"}',
        ];
    }
}
