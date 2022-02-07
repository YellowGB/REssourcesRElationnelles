<?php

use App\Models\Role;
use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('firstname');
            $table->string('nickname')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('description', 1000)->nullable();
            $table->string('postcode');  // string pour gérer plus facilement les codes commençant par un zero
            // Vérifier que le chemin fonctionne bien une fois le projet plus avancé :
            $table->string('avatar', 2048)->default('storage/app/public/images/default_avatar.png');
            // $table->string('status');
            $table->foreignId('role_id')->constrained();
            $table->rememberToken();
            $table->timestamp('last_connexion');
            $table->timestamps();
            $table->softDeletes();
            $table->timestamp('suspended_at')->nullable();
        });

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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
