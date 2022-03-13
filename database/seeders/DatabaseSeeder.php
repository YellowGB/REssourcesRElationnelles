<?php

namespace Database\Seeders;

use App\Models\Jeu;
use App\Models\Defi;
use App\Models\Role;
use App\Models\User;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Course;
use App\Models\Groupe;
use App\Enums\UserRole;
use App\Models\Article;
use App\Models\Atelier;
use App\Models\Lecture;
use App\Models\Message;
use App\Models\Activite;
use App\Models\Categorie;
use App\Models\Ressource;
use App\Models\Commentaire;
use App\Models\Progression;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // On créer un compte de chaque type de base pour faciliter les tests
        $user = User::create([
            'name'              => 'Dupont',
            'firstname'         => 'Germaine',
            'email'             => 'cit@a',
            'email_verified_at' => now(),
            'password'          => '$2y$10$Yi9q3k8RA6Nuuj0G3RzD7uxcMdEuy/6T2rB.INfT88KqfGTcFOYIC', // a
            'remember_token'    => 'adcountdcp',
            'postcode'          => '69100',
            // 'status'            => UserStatus::Verified,
            'role_id'           => Role::findId(UserRole::VerifCitizen),
            'last_connexion'    => now(),
        ]);
        $user->markEmailAsVerified();
        $user = User::create([
            'name'              => 'Durand',
            'firstname'         => 'André',
            'email'             => 'modo@a',
            'email_verified_at' => now(),
            'password'          => '$2y$10$Yi9q3k8RA6Nuuj0G3RzD7uxcMdEuy/6T2rB.INfT88KqfGTcFOYIC', // a
            'remember_token'    => 'adcountdcp',
            'postcode'          => '71340',
            // 'status'            => UserStatus::Verified,
            'role_id'           => Role::findId(UserRole::Moderator),
            'last_connexion'    => now(),
        ]);
        $user->markEmailAsVerified();
        $user = User::create([
            'name'              => 'Fichter',
            'firstname'         => 'Cindy',
            'email'             => 'admin@a',
            'email_verified_at' => now(),
            'password'          => '$2y$10$Yi9q3k8RA6Nuuj0G3RzD7uxcMdEuy/6T2rB.INfT88KqfGTcFOYIC', // a
            'remember_token'    => 'adcountdcp',
            'postcode'          => '42300',
            // 'status'            => UserStatus::Verified,
            'role_id'           => Role::findId(UserRole::Admin),
            'last_connexion'    => now(),
        ]);
        $user->markEmailAsVerified();
        $user = User::create([
            'name'              => 'Elba',
            'firstname'         => 'Karim',
            'email'             => 'superadmin@a',
            'email_verified_at' => now(),
            'password'          => '$2y$10$Yi9q3k8RA6Nuuj0G3RzD7uxcMdEuy/6T2rB.INfT88KqfGTcFOYIC', // a
            'remember_token'    => 'adcountdcp',
            'postcode'          => '75001',
            // 'status'            => UserStatus::Verified,
            'role_id'           => Role::findId(UserRole::SuperAdmin),
            'last_connexion'    => now(),
        ]);
        $user->markEmailAsVerified();
        
        User::factory()->count(10)->create();
        for ($i = 1; $i <= 13; $i++) Categorie::factory()->create();

        $this->call([
            RessourceSeeder::class,
        ]);

        Activite::factory()->count(10)->create();
        Article::factory()->count(10)->create();
        Atelier::factory()->count(10)->create();
        Course::factory()->count(10)->create();
        Defi::factory()->count(10)->create();
        Jeu::factory()->count(10)->create();
        Lecture::factory()->count(10)->create();
        Photo::factory()->count(10)->create();
        Video::factory()->count(10)->create();

        Progression::factory()->count(40)->create();
        Groupe::factory()->count(7)->create();
        Commentaire::factory()->count(50)->create();
        Message::factory()->count(80)->create();
    }
}
