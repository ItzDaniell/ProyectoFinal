<?php

namespace Database\Seeders;

use App\Models\Categorias;
use App\Models\Conferencia;
use App\Models\Ponente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConferenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ponentes = Ponente::all();
        $categorias = Categorias::all();

        foreach ($ponentes as $ponente) {
            $cantidadConferencias = mt_rand(1, 5); // Número aleatorio de conferencias por ponente

            for ($i = 1; $i <= $cantidadConferencias; $i++) {
                Conferencia::create([
                    'id_ponente' => $ponente->id_ponente,
                    'id_categoria' => $categorias->random()->id_categoria, // Selecciona una categoría aleatoria
                    'titulo' => "Conferencia del Ponente {$ponente->nombres} - $i",
                    'descripcion' => "Esta es la descripción de la conferencia $i del ponente {$ponente->nombres}.",
                    'tiempo' => '02:00:00', // Duración de 2 horas (puedes ajustar este valor)
                    'fecha_inicio' => now()->addDays(mt_rand(1, 30)), // Fecha de inicio aleatoria en el próximo mes
                    'imagen' => "imagen_conferencia_{$ponente->id_ponente}_$i.jpg", // Nombre ficticio para la imagen
                    'URL' => "https://example.com/conferencia-{$ponente->id_ponente}-$i", // URL ficticia
                ]);
            }
        }
    }
}
