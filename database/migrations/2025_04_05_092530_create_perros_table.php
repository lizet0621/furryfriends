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

            // Referencia al usuario que registró al perro
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->boolean('disponible')->default(true);
            $table->timestamps();

            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('perros');
    }
}
