<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('ressource_id')->references('id')->on('ressources')->onDelete('cascade');
            $table->string('status');
            $table->unsignedInteger('reports')->nullable();         // le nombre de fois où le commentaire a été signalé, s'incrémente à chaque nouveau signalement
            $table->unsignedBigInteger('replies_to')->nullable();   // ID du commentaire auquel ce commentaire répond si c'est le cas
            $table->foreign('replies_to')->references('id')->on('commentaires')->onDelete('cascade');
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
        Schema::dropIfExists('commentaires');
    }
}
