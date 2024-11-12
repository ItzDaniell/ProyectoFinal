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
            $table->id('id_comentarios');
            $table->unsignedBigInteger('id_publicacion');
            $table->unsignedBigInteger('id_comentarista');
            $table->string('contenido_come',45);
            $table->string('estado_come',45);
            $table->timestamps();

            $table->foreign('id_publicacion')->references('id_publicacion')->on('publicacion');
            $table->foreign('id_comentarista')->references('id_comentarista')->on('comentarista');
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
