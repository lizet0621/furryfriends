<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerrosTable extends Migration
{
   public function up()
    {
        Schema::create('perros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('edad');
            $table->string('imagenperro')->nullable();
            $table->string('raza');
            $table->string('color');
            $table->enum('tamanio', ['Pequeño', 'Mediano', 'Grande']);
            $table->enum('sexo', ['Macho', 'Hembra']);
            $table->text('historial_clinico')->nullable();
            $table->text('descripcion')->nullable();

            // Foreign key hacia roles
            $table->unsignedBigInteger('refugio_id');

            // Asegura que el motor de la tabla sea InnoDB
            $table->engine = 'InnoDB';

            $table->foreign('refugio_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->boolean('disponible')->default(true);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('perros');
    }
}