<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Perros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('edad');
            $table->string('imagenperro')->nullable();
            $table->string('raza')->nullable();
            $table->string('color')->nullable();
            $table->enum('tamanio', ['Pequeño', 'Mediano', 'Grande']);
            $table->enum('sexo', ['Macho', 'Hembra']);
            $table->text('historial_clinico')->nullable();
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('refugio_id')->constrained('refugios')->onDelete('cascade');
            $table->string('disponible')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Perros');
    }
};