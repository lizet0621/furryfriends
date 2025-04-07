<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('viabilidadEstudios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rol_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable(); // Usuario que sube el archivo
            $table->string('archivo'); // Ruta del archivo
            $table->string('nombre_original'); // Nombre original del archivo
            $table->boolean('activo')->default(true);
            $table->timestamps();

            $table->foreign('rol_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('viabilidadEstudios');
}
};