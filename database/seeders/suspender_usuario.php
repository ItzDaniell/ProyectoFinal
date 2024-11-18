<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class suspender_usuario extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::find(2);  // Aquí puedes seleccionar al usuario que deseas suspender
        $user->suspendido_hasta = now()->addDays(7); // Suspender por 7 días
        $user->save();
    }
}
