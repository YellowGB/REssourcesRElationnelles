<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groupes', function (Blueprint $table) {
            $table->id();
            $table->string('name');                         // Nom du groupe
            $table->foreignId('user_id')->constrained();    // L'utilisateur qui a créé le groupe
            $table->boolean('invitations')->default(true);  // les membres sont autorisés à inviter d'autres participants ou ne le sont pas (dans ce cas, uniquement le createur peut inviter)
            $table->foreignId('ressource_id')->nullable()->constrained();
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
        Schema::dropIfExists('groupes');
    }
}
