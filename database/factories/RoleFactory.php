<?php

namespace Database\Factories;

use App\Enums\UserRole;
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
                UserRole::Citizen,
                UserRole::VerifCitizen,
                UserRole::Moderator,
                UserRole::Admin,
                UserRole::SuperAdmin,
            ]),
            'permissions'   => '{"can_create_ressources": "1"}',
        ];
    }
}
