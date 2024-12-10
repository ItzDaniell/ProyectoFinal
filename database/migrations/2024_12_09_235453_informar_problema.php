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
        Schema::create('informar_problemas', function (Blueprint $table) {
            $table->id('id_informar_problema');
            $table->unsignedBigInteger('id');
            $table->string('tipo',100);
            $table->string('imagen', 2048)->nullable();
            $table->string('descripcion',2048);
            $table->string('estado',100)->default('Activo');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('users');
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
