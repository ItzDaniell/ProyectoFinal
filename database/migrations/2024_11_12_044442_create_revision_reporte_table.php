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
        Schema::create('revision_reportes', function (Blueprint $table) {
            $table->id('id_revision');
            $table->foreign('id_moderador')->references('id_moderador')->on('moderadores');
            $table->foreign('id_reporte')->references('id_reporte')->on('reportes');
            $table->string('accion',150);
            $table->string('comentario',300);
            $table->timestamps();
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
