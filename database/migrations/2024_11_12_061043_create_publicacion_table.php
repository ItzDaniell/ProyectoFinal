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
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('id_categoria');
            $table->string('titulo',150);
            $table->string('slug')->unique();
            $table->string('archivo', 2048);
            $table->string('descripcion',2048);
            $table->string('URL', 2048)->nullable();
            $table->string('estado',100)->default('Activo');
            $table->timestamps();

            $table->foreign('id_categoria')->references('id_categoria')->on('categorias');
            $table->foreign('id')->references('id')->on('users');
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
