<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('unites_enseignement', function (Blueprint $table) {
            $table->id();
            $table->string('code'); // Code de l'UE (ex: UE11)
            $table->string('nom'); // Nom de l'UE
            $table->integer('credits_ects'); // Crédits ECTS
            $table->integer('semestre'); // Semestre (1 à 6)
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('unites_enseignement');
    }
};
