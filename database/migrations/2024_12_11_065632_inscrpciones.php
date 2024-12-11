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
            $table->id('id_inscripcion');
            $table->unsignedBigInteger('id')->unique();
            $table->unsignedBigInteger('id_conferencia');
            $table->string('estado')->default('Activo');
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
        //
    }
};
