<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->bigIncrements('id_noticia');
            $table->string('titulo', 150);
            $table->string('autor', 150);
            $table->string('descripcion', 300);
            $table->string('imagen', 300);
            $table->string('URL', 300);
            $table->string('estado', 100);
            $table->unsignedBigInteger('id_categoria'); // Agregar esta línea para la columna id_categoria
            $table->timestamps();
    
            // Agregar la clave foránea
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
