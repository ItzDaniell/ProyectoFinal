<?php

use App\Http\Controllers\BanController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ConferenciaController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\PonenteController;
use App\Http\Controllers\PostInicioSesionController;
use App\Http\Controllers\PreInicioSesionController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use Cog\Laravel\Ban\Http\Middleware\ForbidBannedUser;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [PreInicioSesionController::class, 'Bienvenida'])->name('Bienvenida');
Route::get('/contactanos', [PreInicioSesionController::class, 'Contactanos'])->name('Contactanos');
Route::post('/contactanos', [PreInicioSesionController::class, 'ProcesarContacto'])->name('Contactanos.post');
Route::get('/sobre-nosotros', [PreInicioSesionController::class, 'SobreNosotros'])->name('SobreNosotros');
Route::get('/FAQ', [PreInicioSesionController::class, 'FAQ'])->name('FAQ');
Route::get('/registrarse', [PreInicioSesionController::class, 'Registrarse'])->name(name: 'Registrarse');
Route::get('/olvidaste-contraseña', [PreInicioSesionController::class, 'OlvidasteContrasena'])->name('OlvidasteContraseña');

Route::middleware(['auth'])->group(function () {
    Route::get('/usuario-baneado', [BanController::class, 'showBan'])->name('baneado.banned');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', ForbidBannedUser::class
])->group(function () {
    Route::get('/home/{busqueda?}/{categoria?}', [PostInicioSesionController::class, 'Home'])->name('Home');
    Route::get('/noticias/{busqueda?}/{categoria?}', [PostInicioSesionController::class, 'Noticias'])->name('Noticias');
    Route::get('/conferencias', [PostInicioSesionController::class, 'Conferencias'])->name('Conferencias');
    Route::get('/configuracion', [PostInicioSesionController::class, 'ConfiguracionPerfil'])->name('Configuracion');
    Route::get('/configuracion/seguridad', [PostInicioSesionController::class, 'ConfiguracionSeguridad'])->name('ConfiguracionSeguridad');
    Route::get('/configuracion/sesiones-activas', [PostInicioSesionController::class, 'ConfiguracionSesionesActivas'])->name('ConfiguracionSesionesActivas');
    Route::get('/configuracion/eliminar-cuenta', [PostInicioSesionController::class, 'ConfiguracionEliminarCuenta'])->name('ConfiguracionEliminarCuenta');
    Route::get('/perfil-usuario', [PostInicioSesionController::class, 'PerfilUsuario'])->name('PerfilUsuario');
    Route::post('/publicacion/store', [PublicacionController::class, 'store'])->name('publicacion.store');
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
});

Route::middleware(['auth', 'can:manage-users'])->group(function () {
    Route::get('/usuarios/index', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::patch('/usuarios/{id}/edit', [UsuarioController::class, 'update'])->name('usuarios.update');
    Route::get('usuarios/{id}/ban', [BanController::class, 'ban'])->name('usuarios.ban');
    Route::patch('usuarios/{id}/ban', [BanController::class, 'banned'])->name('usuarios.banned');
    Route::get('usuarios/baneados', [BanController::class, 'bans'])->name('usuarios.bans');
    Route::get('usuarios/{id}/desban', [BanController::class, 'desban'])->name('usuarios.desban');
    Route::patch('usuarios/{id}/desban', [BanController::class, 'desbanned'])->name('usuarios.desbanned');
});

Route::middleware(['auth', 'can:manage-publications'])->group(function () {
    Route::get('/publicaciones/index', [PublicacionController::class, 'index'])->name('publicacion.index');
    Route::get('/publicacion/{id}/edit', [PublicacionController::class, 'edit'])->name('publicacion.edit');
    Route::patch('/publicacion/{id}/edit', [PublicacionController::class, 'update'])->name('publicacion.update');
});

Route::middleware(['auth', 'can:manage-category'])->group(function () {
    Route::get('/categorias/index', [CategoriaController::class, 'index'])->name('categorias.index');
    Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
    Route::post('/categorias/create', [CategoriaController::class, 'store'])->name('categorias.store'); 
    Route::get('/categorias/{id}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
    Route::patch('/categorias/{id}/edit', [CategoriaController::class, 'update'])->name('categorias.update');
});

