<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Ressource;
use App\Enums\RessourceType;
use App\Enums\RessourceStatus;
use Illuminate\Database\Seeder;
use App\Enums\RessourceRelation;
use App\Enums\RessourceRestriction;
use Carbon\Carbon;

class RessourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $types = [
            RessourceType::Activite->value,
            RessourceType::Article->value,
            RessourceType::Atelier->value,
            RessourceType::Course->value,
            RessourceType::Defi->value,
            RessourceType::Jeu->value,
            RessourceType::Lecture->value,
            RessourceType::Photo->value,
            RessourceType::Video->value,
        ];

        for ($i = 1; $i <= 100; $i++) {
            for ($j = 0; $j < count($types); $j++) {
                Ressource::create([
                    'title'                 => $faker->sentence(),
                    'ressourceable_type'    => $faker->unique()->randomElement($types),
                    'ressourceable_id'      => $i,
                    'relation'              => $faker->randomElement([
                        RessourceRelation::Self->value,
                        RessourceRelation::Spouse->value,
                        RessourceRelation::Family->value,
                        RessourceRelation::Pro->value,
                        RessourceRelation::Friend->value,
                        RessourceRelation::Stranger->value,
                        ]),
                    'user_id'               => rand(1, 10),
                    'categorie_id'          => rand(1, 13),
                    'status'                => $faker->randomElement([
                        RessourceStatus::Draft,
                        RessourceStatus::Pending,
                        RessourceStatus::Published,
                        // RessourceStatus::Deleted,
                        ]),
                    'restriction'           => $faker->randomElement([
                        RessourceRestriction::Private,
                        RessourceRestriction::Public,
                        ]),
                    'created_at'            => Carbon::today()->subDays(rand(0, 90)),
                    'count'                 => rand_prob(3000, 99, 5000), // 99% de chance de générer un nombre entre 0 et 3000, 20% entre 3001 et 5000
                ]);
            }
            $faker->unique(true);
        }
    }
}
