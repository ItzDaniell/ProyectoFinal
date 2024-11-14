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
            $table->id('id_noticia');
            $table->foreign('id_categoria')->references('id_categoria')->on('categorias');
            $table->string('titulo',100);
            $table->string('autor',100);
            $table->string('descripcion_noticia',300);
            $table->string('url',300);
            $table->string('estado',45);
            $table->timestamps();
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
