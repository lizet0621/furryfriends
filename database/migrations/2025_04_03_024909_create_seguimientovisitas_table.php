<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('SeguimientoVisitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rol_id')->nullable(); // Relación con roles
            $table->string('archivo');
            $table->boolean('activo')->default(true); // Campo para eliminación lógica
            $table->timestamps();

            // Clave foránea apuntando a roles
            $table->foreign('rol_id')
                  ->references('id')
                  ->on('roles') // Asegúrate de que esta tabla existe antes de ejecutar la migración
                  ->onDelete('cascade');
        });;

    }
    public function down(): void
    {
        Schema::dropIfExists('SeguimientoVisitas');
    }
};