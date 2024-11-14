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
        Schema::create('revision_reporte', function (Blueprint $table) {
            $table->id('id_revision');
            $table->unsignedBigInteger('id_reporte');
            $table->unsignedBigInteger('id_moderador');
            $table->string('accion',45);
            $table->string('comentario',300);
            $table->timestamps();

            $table->foreign('id_moderador')->references('id_moderador')->on('moderador');
            $table->foreign('id_reporte')->references('id_reporte')->on('reporte');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revision_reporte');
    }
};
