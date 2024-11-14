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
        Schema::create('conferencia', function (Blueprint $table) {
            $table->id('id_conferencia');
            $table->unsignedBigInteger('id_ponente');
            $table->string('titulo_con',45);
            $table->string('descripcion_con',45);
            $table->string('tipo_con',45);
            $table->time('tiempo_con');
            $table->date('fecha_inicio');
            $table->string('url_con',300);
            $table->string('conferenciacol',45);
            $table->timestamps();

            $table->foreign('id_ponente')->references('id_ponente')->on('ponente');
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
