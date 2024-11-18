<?php

use App\Http\Controllers\ConferenciaController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\PonenteController;
use App\Http\Controllers\PostInicioSesionController;
use App\Http\Controllers\PreInicioSesionController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [PreInicioSesionController::class, 'Bienvenida'])->name('Bienvenida');
Route::get('/contactanos', [PreInicioSesionController::class, 'Contactanos'])->name('Contactanos');
Route::get('/sobre-nosotros', [PreInicioSesionController::class, 'SobreNosotros'])->name('SobreNosotros');
Route::get('/FAQ', [PreInicioSesionController::class, 'FAQ'])->name('FAQ');
Route::get('/registrarse', [PreInicioSesionController::class, 'Registrarse'])->name(name: 'Registrarse');
Route::get('/olvidaste-contraseña', [PreInicioSesionController::class, 'OlvidasteContrasena'])->name('OlvidasteContraseña');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home', [PostInicioSesionController::class, 'Home'])->name('Home');
    Route::get('/noticias', [PostInicioSesionController::class, 'Noticias'])->name('Noticias');
    Route::get('/conferencias', [PostInicioSesionController::class, 'Conferencias'])->name('Conferencias');
    Route::get('/configuracion', [PostInicioSesionController::class, 'ConfiguracionPerfil'])->name('Configuracion');
    Route::get('/configuracion/seguridad', [PostInicioSesionController::class, 'ConfiguracionSeguridad'])->name('ConfiguracionSeguridad');
    Route::get('/configuracion/sesiones-activas', [PostInicioSesionController::class, 'ConfiguracionSesionesActivas'])->name('ConfiguracionSesionesActivas');
    Route::get('/configuracion/eliminar-cuenta', [PostInicioSesionController::class, 'ConfiguracionEliminarCuenta'])->name('ConfiguracionEliminarCuenta');
    Route::get('/perfil-usuario', [PostInicioSesionController::class, 'PerfilUsuario'])->name('PerfilUsuario');
});

Route::middleware(['auth', 'can:manage-news'])->group(function () {
    Route::get('/noticias/index', [NoticiaController::class, 'index'])->name('noticias.index');
    Route::get('/noticias/create', [NoticiaController::class, 'create'])->name('noticias.create');
    Route::post('/noticias/create', [NoticiaController::class, 'store'])->name('noticias.store');
    Route::get('/noticias/{id}/edit', [NoticiaController::class, 'edit'])->name('noticias.edit');
    Route::patch('/noticias/{id}/edit', [NoticiaController::class, 'update'])->name('noticias.update');
});

Route::middleware(['auth', 'can:manage-conferences'])->group(function () {
    Route::get('/conferencias/index', [ConferenciaController::class, 'index'])->name('conferencias.index');
    


    Route::get('/ponentes/index', [PonenteController::class, 'index'])->name('ponentes.index');
    Route::get('/ponentes/create', [PonenteController::class, 'create'])->name('ponentes.create');
    Route::post('/ponentes/create', [PonenteController::class, 'store'])->name('ponentes.store'); 
    Route::get('/ponentes/{id}/edit', [PonenteController::class, 'edit'])->name('ponentes.edit');
    Route::patch('/ponentes/{id}/edit', [PonenteController::class, 'update'])->name('ponentes.update');
    Route::get('/ponentes/{id}', [PonenteController::class, 'show'])->name('ponentes.show');
   // Route::delete('/ponentes/{id}', [PonenteController::class, 'destroy'])->name('ponentes.destroy');//
});

Route::middleware(['auth', 'can:manage-users'])->group(function () {
    Route::get('/usuarios/index', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::patch('/usuarios/{id}/edit', [UsuarioController::class, 'update'])->name('usuarios.update');
    Route::get('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
});




