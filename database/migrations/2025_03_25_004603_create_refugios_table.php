<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefugiosTable extends Migration // Asegúrate de que este nombre es único
{
    public function up()
    {
        Schema::create('refugios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('telefono');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('tipo_refugio'); // "persona_natural" o "fisico"
            $table->string('direccion')->nullable();
            $table->string('ciudad')->nullable();
            $table->integer('capacidad')->nullable();
            $table->string('horarios')->nullable();
            $table->string('responsable')->nullable();
            $table->text('servicios')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('refugios');
    }



}