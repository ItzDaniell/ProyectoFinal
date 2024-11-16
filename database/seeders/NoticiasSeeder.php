<?php

namespace Database\Seeders;

use App\Models\Categorias;
use App\Models\Noticia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoticiasSeeder extends Seeder
{
    public function run()
    {
        $categorias = Categorias::all(); // Obtiene todas las categorías
        $contador = 0;

        foreach ($categorias as $categoria) {
            $cantidadNoticias = mt_rand(1, 10); // Número aleatorio de noticias por categoría

            for ($i = 1; $i <= $cantidadNoticias; $i++) {
                $contador++;
                Noticia::create([
                    'id_categoria' => $categoria->id_categoria, // Relación con la categoría
                    'titulo'       => "Noticia $contador",
                    'autor'        => "Autor " . mt_rand(1, 10),
                    'descripcion'  => "Descripción de la noticia $contador en la categoría {$categoria->nombre}",
                    'imagen'       => "imagen_$contador.jpg", // Nombre ficticio para la imagen
                    'URL'          => "https://example.com/noticia-$contador", // URL ficticia
                    'estado'       => mt_rand(0, 1) ? 'publicada' : 'borrador', // Estado aleatorio
                ]);
            }
        }
    }
}
