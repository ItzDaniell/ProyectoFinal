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
        Schema::create('informes_procesados', function (Blueprint $table) {
            $table->id('id_informe_procesado');
            $table->unsignedBigInteger('id_servicio_tecnico');
            $table->unsignedBigInteger('id_informar_problema');
            $table->string('comentario',2048);
            $table->string('estado',100);
            $table->timestamps();
            $table->foreign('id_servicio_tecnico')->references('id')->on('users');
            $table->foreign('id_informar_problema')->references('id_informar_problema')->on('informar_problemas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
