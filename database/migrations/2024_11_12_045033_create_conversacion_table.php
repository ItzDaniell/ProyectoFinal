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
        Schema::create('conversacion', function (Blueprint $table) {
            $table->id('id_conversacion');
            $table->unsignedBigInteger('id_mensaje');
            $table->string('estado',45);
            $table->timestamps();

            $table->foreign('id_mensaje')->references('id_mensaje')->on('mensaje');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversacion');
    }
};
