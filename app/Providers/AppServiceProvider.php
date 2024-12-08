<?php

namespace App\Providers;

use App\Models\Categorias;
use Illuminate\Support\Facades\Blade;
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
        if (Schema::hasTable('categorias')) {
            view()->share('categorias', Categorias::all());
        }
    }

    
    
}
