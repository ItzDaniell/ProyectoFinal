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
        Schema::create('reportes_procesados', function (Blueprint $table) {
            $table->id('id_reporte_procesado');
            $table->integer('id_moderador');
            $table->unsignedBigInteger('id_reporte');
            $table->string('comentario',2048);
            $table->string('accion',2048);
            $table->string('estado',100);
            $table->timestamps();

            $table->foreign('id_reporte')->references('id_reporte')->on('reportes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reportes_procesados', function (Blueprint $table) {
            //
        });
    }
};
