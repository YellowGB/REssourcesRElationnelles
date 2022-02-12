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

        // Création des utilisateurs de tests transférée après la création de la table user_preferences
        // (créer d'erreur lors des migrations à la création de la table users qui trigger l'event created() de l'observer UserObserver )
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
