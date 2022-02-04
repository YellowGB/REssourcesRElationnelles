<?php

// use App\Enums\CommentaireStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('ressource_id')->constrained()->onDelete('cascade');
            // $table->string('status')->default(CommentaireStatus::Published->value);
            $table->unsignedInteger('reports')->nullable();         // le nombre de fois où le commentaire a été signalé, s'incrémente à chaque nouveau signalement
            $table->unsignedBigInteger('replies_to')->nullable();   // ID du commentaire auquel ce commentaire répond si c'est le cas
            $table->foreign('replies_to')->references('id')->on('commentaires')->onDelete('cascade');
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
        Schema::dropIfExists('commentaires');
    }
}
