<?php

use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\PostInicioSesionController;
use App\Http\Controllers\PreInicioSesionController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [PreInicioSesionController::class, 'Bienvenida'])->name('Bienvenida');
Route::get('/Contactanos', [PreInicioSesionController::class, 'Contactanos'])->name('Contactanos');
Route::get('/SobreNosotros', [PreInicioSesionController::class, 'SobreNosotros'])->name('SobreNosotros');
Route::get('/FAQ', [PreInicioSesionController::class, 'FAQ'])->name('FAQ');
Route::get('/Registrarse', [PreInicioSesionController::class, 'Registrarse'])->name(name: 'Registrarse');
Route::get('/OlvidasteContraseña', [PreInicioSesionController::class, 'OlvidasteContrasena'])->name('OlvidasteContraseña');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/Home', [PostInicioSesionController::class, 'Home'])->name('Home');
    Route::get('/Noticias', [PostInicioSesionController::class, 'Noticias'])->name('Noticias');
    Route::get('/Conferencias', [PostInicioSesionController::class, 'Conferencias'])->name('Conferencias');
    Route::get('/Configuracion', [PostInicioSesionController::class, 'ConfiguracionPerfil'])->name('Configuracion');
    Route::get('/Configuracion/Seguridad', [PostInicioSesionController::class, 'ConfiguracionSeguridad'])->name('ConfiguracionSeguridad');
    Route::get('/Configuracion/SesionesActivas', [PostInicioSesionController::class, 'ConfiguracionSesionesActivas'])->name('ConfiguracionSesionesActivas');
    Route::get('/Configuracion/EliminarCuenta', [PostInicioSesionController::class, 'ConfiguracionEliminarCuenta'])->name('ConfiguracionEliminarCuenta');
    Route::get('/PerfilUsuario', [PostInicioSesionController::class, 'PerfilUsuario'])->name('PerfilUsuario');
});

Route::middleware(['auth', 'can:manage-news'])->group(function () {
    Route::get('/noticias/index', [NoticiaController::class, 'index'])->name('noticias.index');
});
