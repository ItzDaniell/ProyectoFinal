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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id('id_comentario');
            $table->unsignedBigInteger('id_publicacion');
            $table->unsignedBigInteger('id');
            $table->string('contenido',300);
            $table->string('estado',100)->default('Activo');
            $table->timestamps();

            $table->foreign('id_publicacion')->references('id_publicacion')->on('publicaciones');
            $table->foreign('id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
