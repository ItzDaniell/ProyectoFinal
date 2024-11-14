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
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->id('id_publicacion');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_categoria')->references('id_categoria')->on('categoria');
            $table->string('titulo',150);
            $table->string('descripcion',300);
            $table->string('imagen', 300);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicacion');
    }
};
