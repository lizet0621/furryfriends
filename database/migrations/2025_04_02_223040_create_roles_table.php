<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->string('ciudad')->nullable();
            $table->integer('capacidad')->nullable();
            $table->string('horarios')->nullable();
            $table->string('responsable')->nullable();
            $table->text('servicios')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();

            // Clave foránea con cascada
            $table->unsignedBigInteger('id_rol');

            $table->foreign('id_rol')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
