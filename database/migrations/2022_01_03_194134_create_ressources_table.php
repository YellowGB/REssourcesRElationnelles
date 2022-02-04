<?php

use App\Enums\RessourceStatus;
use App\Enums\RessourceRestriction;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('status')->default(RessourceStatus::Pending->value);
            $table->string('restriction')->default(RessourceRestriction::Public->value);
            $table->timestamps();
            $table->softDeletes();
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
