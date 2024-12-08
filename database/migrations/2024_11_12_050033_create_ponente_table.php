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
        Schema::create('ponentes', function (Blueprint $table) {
            $table->id('id_ponente');
            $table->string('nombres',100);
            $table->string('slug')->unique();
            $table->string('correo',300);
            $table->string('biografia',2048);
            $table->string('foto', 300);
            $table->string('estado', 300)->default('Activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ponente');
    }
};
