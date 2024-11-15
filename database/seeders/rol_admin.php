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
        $adminUser = User::first(); // Encuentra al primer usuario en la base de datos
        if ($adminUser) {
            $adminUser->assignRole('Admin'); // Asigna el rol Admin
        }
    }
}
