<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class rol_admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Juan Daniel Rodriguez Ordoñez', // Nombre del usuario
            'email' => 'juan@gmail.con', // Correo del usuario
            'password' => bcrypt('daniel8048'), // Contraseña encriptada
        ]);
        $adminUser = User::first(); // Encuentra al primer usuario en la base de datos
        if ($adminUser) {
            $adminUser->assignRole('Admin'); // Asigna el rol Admin
        }
    }
}
