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
        Schema::create('contacto', function (Blueprint $table) {
            $table->id('id_contacto');
            $table->unsignedBigInteger('id_conversacion');
            $table->string('nombre_co',100);
            $table->string('correo_co',100);
            $table->string('estado_co',45);
            $table->timestamps();

            $table->foreign('id_conversacion')->references('id_conversacion')->on('conversacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacto');
    }
};
