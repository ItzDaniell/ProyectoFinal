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
        Schema::create('conferencias', function (Blueprint $table) {
            $table->id('id_conferencia');
            $table->unsignedBigInteger('id_ponente');
            $table->unsignedBigInteger('id_categoria');
            $table->string('titulo_conferencia',150);
            $table->string('descripcion_conferencia',300);
            $table->time('tiempo_conferencia');
            $table->date('fecha_inicio');
            $table->string('url_conferencia',300);
            $table->timestamps();
            
            $table->foreign('id_categoria')->references('id_categoria')->on('categorias');
            $table->foreign('id_ponente')->references('id_ponente')->on('ponentes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conferencia');
    }
};
