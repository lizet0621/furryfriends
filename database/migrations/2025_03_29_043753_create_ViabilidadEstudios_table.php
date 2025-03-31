<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ViabilidadEstudios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('adoptante_id');
            $table->unsignedBigInteger('refugio_id');
            $table->string('archivo'); // Guardará la ruta del archivo
            $table->timestamps();

            // Relaciones
            $table->foreign('adoptante_id')->references('id')->on('adoptantes')->onDelete('cascade');
            $table->foreign('refugio_id')->references('id')->on('refugios')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ViabilidadEstudios');
    }
};