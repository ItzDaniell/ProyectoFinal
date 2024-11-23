<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $adminUser = User::create([
            'name' => 'Juan Daniel Rodriguez Ordoñez', // Nombre del usuario
            'email' => 'juan@gmail.com', // Correo del usuario
            'password' => Hash::make('daniel8048'), // Contraseña encriptada
            'rol' => 'Administrador'
        ]);

        // Verifica si el rol 'Admin' existe
        $adminRole = Role::where('name', 'Admin')->first();

        // Asigna el rol Admin al usuario creado
        if ($adminUser && $adminRole) {
            $adminUser->assignRole($adminRole);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_user');
    }
};
