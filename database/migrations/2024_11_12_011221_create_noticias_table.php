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
        Schema::create('noticias', function (Blueprint $table) {
            $table->bigIncrements('id_noticia');
            $table->unsignedBigInteger('id_categoria');
            $table->string('titulo',100);
            $table->string('slug')->unique();
            $table->string('autor',100);
            $table->string('descripcion',2048);
            $table->string('imagen',2048);
            $table->string('URL',300);
            $table->string('estado',100)->default('Activo');
            $table->timestamps();
            $table->foreign('id_categoria')->references('id_categoria')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticias');
    }
};
