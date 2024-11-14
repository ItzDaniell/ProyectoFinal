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
        Schema::create('soporte_tecnico', function (Blueprint $table) {
            $table->id('id_soporte');
            $table->string('nombre_sop',45);
            $table->string('correo_sop',45);
            $table->string('estado_sop',45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soporte_tecnico');
    }
};
