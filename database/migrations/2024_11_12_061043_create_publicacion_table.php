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
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('id_categoria');
            $table->string('titulo',150);
            $table->string('imagen', 300)->nullable();
            $table->string('descripcion',300)->nullable();
            $table->string('estado',100)->default('Activo');
            $table->timestamps();

            $table->foreign('id_categoria')->references('id_categoria')->on('categorias');
            $table->foreign('id_users')->references('id')->on('users');
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
