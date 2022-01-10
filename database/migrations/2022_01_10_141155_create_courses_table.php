<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('file_uri', 2048);   // afin d'éviter tout problème avec des noms identiques qui pourraient écraser des fichiers existants, les fichiers uploadés auront tous un nom unique généré automatiquement
            $table->string('file_name', 500);   // Le nom à afficher pour les utilisateurs
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
