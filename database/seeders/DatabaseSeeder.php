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
use App\Models\Commentaire;
use App\Models\Progression;
use App\Models\Statistique;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'email'             => 'cit@websh.fr',
            'email_verified_at' => now(),
            'password'          => '$2y$10$WfIERGRGk6wbf03gfjf/lerBm96QkkM0YCvHnKtXgrvptqVevukF.', // p@ssWORD1234
            'remember_token'    => 'adcountdcp',
            'postcode'          => '69100',
            'role_id'           => Role::findId(UserRole::VerifCitizen),
            'last_connexion'    => now(),
        ]);
        $user->markEmailAsVerified();
        $user = User::create([
            'name'              => 'Durand',
            'firstname'         => 'André',
            'email'             => 'modo@websh.fr',
            'email_verified_at' => now(),
            'password'          => '$2y$10$WfIERGRGk6wbf03gfjf/lerBm96QkkM0YCvHnKtXgrvptqVevukF.', // p@ssWORD1234
            'remember_token'    => 'adcountdcp',
            'postcode'          => '71340',
            'role_id'           => Role::findId(UserRole::Moderator),
            'last_connexion'    => now(),
        ]);
        $user->markEmailAsVerified();
        $user = User::create([
            'name'              => 'Fichter',
            'firstname'         => 'Cindy',
            'email'             => 'admin@websh.fr',
            'email_verified_at' => now(),
            'password'          => '$2y$10$WfIERGRGk6wbf03gfjf/lerBm96QkkM0YCvHnKtXgrvptqVevukF.', // p@ssWORD1234
            'remember_token'    => 'adcountdcp',
            'postcode'          => '42300',
            'role_id'           => Role::findId(UserRole::Admin),
            'last_connexion'    => now(),
        ]);
        $user->markEmailAsVerified();
        $user = User::create([
            'name'              => 'Elba',
            'firstname'         => 'Karim',
            'email'             => 'superadmin@websh.fr',
            'email_verified_at' => now(),
            'password'          => '$2y$10$WfIERGRGk6wbf03gfjf/lerBm96QkkM0YCvHnKtXgrvptqVevukF.', // p@ssWORD1234
            'remember_token'    => 'adcountdcp',
            'postcode'          => '75001',
            'role_id'           => Role::findId(UserRole::SuperAdmin),
            'last_connexion'    => now(),
        ]);
        $user->markEmailAsVerified();
        
        User::factory()->count(400)->create();
        for ($i = 1; $i <= 13; $i++) Categorie::factory()->create();

        $this->call([
            RessourceSeeder::class,
        ]);

        Activite::factory()->count(100)->create();
        Article::factory()->count(100)->create();
        Atelier::factory()->count(100)->create();
        Course::factory()->count(100)->create();
        Defi::factory()->count(100)->create();
        Jeu::factory()->count(100)->create();
        Lecture::factory()->count(100)->create();
        Photo::factory()->count(100)->create();
        Video::factory()->count(100)->create();

        Progression::factory()->count(1000)->create();
        Groupe::factory()->count(7)->create();
        DB::insert("INSERT INTO groupe_user (groupe_id, user_id) VALUES (1, 1)");
        DB::insert("INSERT INTO groupe_user (groupe_id, user_id) VALUES (1, 2)");
        DB::insert("INSERT INTO groupe_user (groupe_id, user_id) VALUES (2, 1)");
        DB::insert("INSERT INTO groupe_user (groupe_id, user_id) VALUES (2, 3)");
        Commentaire::factory()->count(50)->create();
        Message::factory()->count(80)->create();
        Statistique::factory()->count(18)->create();
    }
}
