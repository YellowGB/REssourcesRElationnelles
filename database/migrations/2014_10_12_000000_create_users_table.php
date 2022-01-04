<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->integer('zipcode');
            // Vérifier que le chemin fonctionne bien une fois le projet plus avancé :
            $table->string('avatar', 2048)->default('storage/app/public/images/default_avatar.png');
            $table->string('status');
            $table->foreignId('role_id')->constrained();
            $table->rememberToken();
            $table->timestamp('last_connexion');
            $table->timestamps();
        });
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
