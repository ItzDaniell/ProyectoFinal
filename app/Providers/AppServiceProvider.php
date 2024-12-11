<?php

namespace App\Providers;

use App\Models\Categorias;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {   
        // Verificar si la tabla 'categorias' existe y compartir las categorías con todas las vistas
        if (Schema::hasTable('categorias')) {
            View::share('categorias', Categorias::all());
        }

        // Compartir la variable needsPassword con todas las vistas
        View::composer('*', function ($view) {
            $user = Auth::user(); // Obtener el usuario autenticado
            $needsPassword = $user && is_null($user->password); // Determinar si necesita configurar la contraseña
            $view->with('needsPassword', $needsPassword); // Compartir la variable con todas las vistas
        });
    }
}
