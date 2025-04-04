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
            $table->foreignId('adoptante_id')->constrained('roles')->onDelete('cascade'); // Relacionado con roles
            $table->foreignId('refugio_id')->constrained('roles')->onDelete('cascade');   // Relacionado con roles
            $table->string('archivo'); // Guardará la ruta del archivo
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ViabilidadEstudios');
}
};