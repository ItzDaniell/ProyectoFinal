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
        Schema::create('moderador', function (Blueprint $table) {
            $table->id('id_moderador');
            $table->string('Nombre_mo',100);
            $table->string('correo_mo',100);
            $table->string('estado_mo',45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moderador');
    }
};