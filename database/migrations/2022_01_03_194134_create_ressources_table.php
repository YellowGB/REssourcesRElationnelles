<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRessourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ressources', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('ressourceable_type');   // type de ressource
            $table->unsignedBigInteger('ressourceable_id')->index();    // id du contenu dans la table correspondante (la table dépend du type)
            $table->string('relation');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('categorie_id')->constrained();
            $table->string('status');
            $table->string('restriction');
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
        Schema::dropIfExists('ressources');
    }
}
