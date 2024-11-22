<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
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
        Permission::create(['name' => 'post-promotions']); // Publicación de promociones (rol empresa)
        Permission::create(['name' => 'manage-news']); // Control de noticias
        Permission::create(['name' => 'manage-users']); // Control de usuarios
        Permission::create(['name' => 'manage-ponents']); // Control de usuarios
        Permission::create(['name' => 'manage-category']); // Control de usuarios
        Permission::create(['name' => 'manage-inscriptions']); // Control de usuarios
        Permission::create(['name' => 'user']); // Usuario

        // Crear roles
        $admin = Role::create(['name' => 'Admin']);
        $moderator = Role::create(['name' => 'Moderador']);
        $conferenceManager = Role::create(['name' => 'Gestor de Conferencias']);
        $techSupport = Role::create(['name' => 'Servicio Tecnico']);
        $company = Role::create(['name' => 'Empresa']);
        $user = Role::create(['name' => 'Usuario']);


        // Asignar permisos a cada rol
        $admin->givePermissionTo(['manage-comments', 'manage-publications', 'manage-reports', 'manage-conferences', 'manage-requests', 'manage-news', 'manage-users', 'manage-category']);
        $moderator->givePermissionTo(['manage-comments', 'manage-publications', 'manage-reports', 'manage-users']);
        $conferenceManager->givePermissionTo(['manage-conferences', 'manage-ponents', 'manage-inscriptions']);
        $techSupport->givePermissionTo(['manage-requests', 'manage-news']);
        $company->givePermissionTo('post-promotions');
        $user->givePermissionTo('user');
    }
}
