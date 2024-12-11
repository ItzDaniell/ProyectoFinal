<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncar las tablas para limpiar roles y permisos previos
        Role::truncate();
        Permission::truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_permissions')->truncate();

        // Reactivar la verificación de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // Crear permisos
        Permission::create(['name' => 'manage-comments']); // Control de comentarios
        Permission::create(['name' => 'manage-publications']); // Control de publicaciones
        Permission::create(['name' => 'manage-reports']); // Control de reportes
        Permission::create(['name' => 'manage-conferences']); // Control de conferencias
        Permission::create(['name' => 'manage-requests']); // Control de solicitudes (soporte técnico)
        Permission::create(['name' => 'manage-news']); // Control de noticias
        Permission::create(['name' => 'manage-users']); // Control de usuarios
        Permission::create(['name' => 'manage-ponents']); // Control de usuarios
        Permission::create(['name' => 'manage-category']); // Control de usuarios
        Permission::create(['name' => 'manage-inscriptions']); // Control de usuarios
        Permission::create(['name' => 'user']); // Usuario
        Permission::create(['name' => 'gestion']);

        // Crear roles
        $admin = Role::create(['name' => 'Admin']);
        $moderator = Role::create(['name' => 'Moderador']);
        $conferenceManager = Role::create(['name' => 'Gestor de Conferencias']);
        $techSupport = Role::create(['name' => 'Servicio Tecnico']);
        $user = Role::create(['name' => 'Usuario']);


        // Asignar permisos a cada rol
        $admin->givePermissionTo(['manage-comments', 'manage-publications', 'manage-reports', 'manage-conferences', 'manage-requests', 'manage-news', 'manage-users', 'manage-ponents', 'manage-category', 'manage-inscriptions', 'gestion']);
        $moderator->givePermissionTo(['manage-comments', 'manage-publications', 'manage-reports', 'manage-users', 'gestion']);
        $conferenceManager->givePermissionTo(['manage-conferences', 'manage-ponents', 'manage-inscriptions', 'gestion']);
        $techSupport->givePermissionTo(['manage-requests', 'manage-news', 'gestion']);
        $user->givePermissionTo('user');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
