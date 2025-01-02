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
        Schema::create('elements_constitutifs', function (Blueprint $table) {
            $table->id();
            $table->string('code'); // Code de l'EC
            $table->string('nom'); // Nom de l'EC
            $table->integer('coefficient'); // Coefficient de l'EC
            $table->foreignId('ue_id')->constrained('unites_enseignement'); // Clé étrangère vers l'UE
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('elements_constitutifs');
    }
};
