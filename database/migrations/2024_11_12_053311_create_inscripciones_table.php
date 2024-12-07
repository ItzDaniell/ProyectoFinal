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
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id('id_incripcion');
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('id_conferencia');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('users');
            $table->foreign('id_conferencia')->references('id_conferencia')->on('conferencias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscripciones');
    }
};
