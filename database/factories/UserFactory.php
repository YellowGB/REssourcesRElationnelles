<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // On récupère la liste des codes postaux français
        $postaux = json_decode(file_get_contents('https://unpkg.com/codes-postaux@3.6.0/codes-postaux.json'));
        $codes   = [];
        foreach ($postaux as $postal) array_push($codes, $postal->codePostal);

        return [
            'name'              => $this->faker->lastname(),
            'firstname'         => $this->faker->firstname(),
            'email'             => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token'    => Str::random(10),
            'postcode'          => $this->faker->randomElement($codes),
            'created_at'        => Carbon::today()->subDays(rand(0, 90)),
            'role_id'           => rand(1, 5),
            'search_count'      => rand_prob(5000, 99, 10000),
            'last_connexion'    => Carbon::now()->subSeconds(rand(0, 60 * 60 * 24 * 3)), // 3 derniers jours
        ];
    }

    /**
     * Un utilisateur avec le rôle citoyenverifie
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function verifiedCitizen()
    {
        return $this->state(function (array $attributes) {
            return [
                'role_id' => 2,
            ];
        });
    }

    /**
     * Un utilisateur avec le rôle moderateur
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function moderator()
    {
        return $this->state(function (array $attributes) {
            return [
                'role_id' => 3,
            ];
        });
    }

    /**
     * Un utilisateur avec le rôle administrateur
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function administrator()
    {
        return $this->state(function (array $attributes) {
            return [
                'role_id' => 4,
            ];
        });
    }

    /**
     * Un utilisateur avec le rôle superadministrateur
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function superAdministrator()
    {
        return $this->state(function (array $attributes) {
            return [
                'role_id' => 5,
            ];
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
