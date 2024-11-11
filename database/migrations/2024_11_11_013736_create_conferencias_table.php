<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('conferencias', function (Blueprint $table) {
            $table->bigIncrements('id_conferencia');
            $table->string('titulo', 150);
            $table->string('descripcion', 300);
            $table->integer('tiempo');
            $table->date('fecha_inicio');
            $table->string('imagen', 300);
            $table->string('URL', 300);
            $table->string('estado', 100);
            $table->timestamps();
    
            // Asegúrate de agregar la columna id_ponente
            $table->unsignedBigInteger('id_ponente');
    
            // Luego, agrega la clave foránea
            $table->foreign('id_ponente')->references('id_ponente')->on('ponentes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conferencias');
    }
};
