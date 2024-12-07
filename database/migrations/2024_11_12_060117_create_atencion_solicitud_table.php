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
        Schema::create('atencion_solicitud', function (Blueprint $table) {
            $table->unsignedBigInteger('id_soporte');
            $table->unsignedBigInteger('id_solicitud');
            $table->string('respuesta',2048);
            $table->timestamps();

            $table->foreign('id_soporte')->references('id_soporte')->on('soporte_tecnico');
            $table->foreign('id_solicitud')->references('id_solicitud')->on('solicitudes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atencion_solicitud');
    }
};
