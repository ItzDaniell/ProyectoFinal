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
        Schema::create('moderadores', function (Blueprint $table) {
            $table->id('id_moderador');
            $table->string('nombre_moderador',150);
            $table->string('correo_moderador',300);
            $table->string('estado_moderador',100);
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
