<?php

use App\Models\Role;
use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_preferences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('theme')->default('light');
            $table->string('lang')->default('fr');
            $table->timestamps();
        });

        // On créer un compte de chaque type de base pour faciliter les tests
        // (présent ici pour ne pas créer d'erreur lors des migrations à la création de la table users qui trigger l'event created() de l'observer UserObserver )
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_preferences');
    }
}
