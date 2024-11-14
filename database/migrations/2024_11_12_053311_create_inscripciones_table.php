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
            $table->id('id_incripciones');
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('id_conferencia');
            $table->timestamps();

            $table->foreign('id_users')->references('id_users')->on('users');
            $table->foreign('id_conferencia')->references('id_conferencia')->on('conferencia');
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
