<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('seguimientoVisitas', function (Blueprint $table) { // Nombre corregido
            $table->id();
            $table->unsignedBigInteger('adoptante_id'); 
            $table->string('archivo');
            $table->timestamps();
    
            // Clave foránea corregida
            $table->foreign('adoptante_id')
                  ->references('id')
                  ->on('adoptantes') // Asegúrate de que esta tabla existe
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seguimientoVisitas'); // Nombre corregido
    }
};