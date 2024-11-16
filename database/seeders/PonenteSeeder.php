<?php

namespace Database\Seeders;

use App\Models\Ponente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PonenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Ponente::create([
                'nombres'   => "Ponente $i",
                'correo'    => "ponente$i@example.com",
                'biografia' => "Biografía del Ponente $i. Este ponente tiene una experiencia vasta en su campo y ha contribuido a múltiples conferencias y seminarios.",
                'foto'      => "foto_ponente_$i.jpg"
            ]);
        }
    }
}
