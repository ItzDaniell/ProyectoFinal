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
        Schema::table('noticias', function (Blueprint $table) {
            // Añadir la columna 'id_categoria'
            $table->unsignedBigInteger('id_categoria');
            
            // Establecer la clave foránea
            $table->foreign('id_categoria')->references('id_categoria')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('noticias', function (Blueprint $table) {
            // Eliminar la clave foránea y la columna
            $table->dropForeign(['id_categoria']);
            $table->dropColumn('id_categoria');
        });
    }
};
