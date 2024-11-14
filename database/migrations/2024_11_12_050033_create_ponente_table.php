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
            $table->string('nombre_ponente',100);
            $table->string('correo_ponente',100);
            $table->string('biografia',300);
            $table->string('imagen',300);
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
