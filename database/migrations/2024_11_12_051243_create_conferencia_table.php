<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('conferencias', function (Blueprint $table) {
            $table->id('id_conferencia');
            $table->unsignedBigInteger('id_ponente');
            $table->unsignedBigInteger('id_categoria');
            $table->string('titulo',150);
            $table->string('slug')->unique();
            $table->string('descripcion',2048);
            $table->integer('duracion');
            $table->datetime('fecha_hora_inicio');
            $table->string('imagen', 2048);
            $table->string('plataforma',150);
            $table->string('URL',500);
            $table->string('estado', 100)->default('Activo');
            $table->timestamps();

            $table->foreign('id_categoria')->references('id_categoria')->on('categorias');
            $table->foreign('id_ponente')->references('id_ponente')->on('ponentes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conferencia');
    }
};
