<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BanController,
    CategoriaController,
    ConferenciaController,
    NoticiaController,
    PonenteController,
    PostInicioSesionController,
    PreInicioSesionController,
    PublicacionController,
    UsuarioController
};
use Cog\Laravel\Ban\Http\Middleware\ForbidBannedUser;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


//Rutas Públicas (No requieren autenticación)
Route::get('/', [PreInicioSesionController::class, 'Bienvenida'])->name('Bienvenida');
Route::get('/contactanos', [PreInicioSesionController::class, 'Contactanos'])->name('Contactanos');
Route::post('/contactanos', [PreInicioSesionController::class, 'ProcesarContacto'])->name('Contactanos.post');
Route::get('/sobre-nosotros', [PreInicioSesionController::class, 'SobreNosotros'])->name('SobreNosotros');
Route::get('/FAQ', [PreInicioSesionController::class, 'FAQ'])->name('FAQ');
Route::get('/registrarse', [PreInicioSesionController::class, 'Registrarse'])->name('Registrarse');
Route::get('/olvidaste-contraseña', [PreInicioSesionController::class, 'OlvidasteContrasena'])->name('OlvidasteContraseña');


//Rutas de Usuarios Baneados
Route::middleware(['auth'])->group(function () {
    Route::get('/usuario-baneado', [BanController::class, 'showBan'])->name('baneado.banned');
});

//Rutas Protegidas por Autenticación y Middlewares
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ForbidBannedUser::class
])->group(function () {
    Route::get('/home', [PostInicioSesionController::class, 'Home'])->name('Home');
    Route::get('/noticias', [PostInicioSesionController::class, 'Noticias'])->name('Noticias');
    Route::get('/conferencias', [PostInicioSesionController::class, 'Conferencias'])->name('Conferencias');
    Route::prefix('/configuracion')->group(function () {
        Route::get('/', [PostInicioSesionController::class, 'ConfiguracionPerfil'])->name('Configuracion');
        Route::get('/seguridad', [PostInicioSesionController::class, 'ConfiguracionSeguridad'])->name('ConfiguracionSeguridad');
        Route::get('/sesiones-activas', [PostInicioSesionController::class, 'ConfiguracionSesionesActivas'])->name('ConfiguracionSesionesActivas');
        Route::get('/eliminar-cuenta', [PostInicioSesionController::class, 'ConfiguracionEliminarCuenta'])->name('ConfiguracionEliminarCuenta');
    });

    Route::get('/perfil-usuario', [PostInicioSesionController::class, 'PerfilUsuario'])->name('PerfilUsuario');
    Route::post('/publicacion/store', [PublicacionController::class, 'store'])->name('publicacion.store');
});


//Rutas de Gestión (Protegidas con Permisos Específicos)
// Noticias
Route::middleware(['auth', 'can:manage-news'])->prefix('/noticias')->group(function () {
    Route::get('/index', [NoticiaController::class, 'index'])->name('noticias.index');
    Route::get('/create', [NoticiaController::class, 'create'])->name('noticias.create');
    Route::post('/create', [NoticiaController::class, 'store'])->name('noticias.store');
    Route::get('/{id}/edit', [NoticiaController::class, 'edit'])->name('noticias.edit');
    Route::patch('/{id}/edit', [NoticiaController::class, 'update'])->name('noticias.update');
});

// Conferencias y Ponentes
Route::middleware(['auth', 'can:manage-conferences'])->prefix('/conferencias')->group(function () {
    Route::get('/index', [ConferenciaController::class, 'index'])->name('conferencias.index');
    Route::prefix('/ponentes')->group(function () {
        Route::get('/index', [PonenteController::class, 'index'])->name('ponentes.index');
        Route::get('/create', [PonenteController::class, 'create'])->name('ponentes.create');
        Route::post('/create', [PonenteController::class, 'store'])->name('ponentes.store');
        Route::get('/{id}/edit', [PonenteController::class, 'edit'])->name('ponentes.edit');
        Route::patch('/{id}/edit', [PonenteController::class, 'update'])->name('ponentes.update');
        Route::get('/{id}', [PonenteController::class, 'show'])->name('ponentes.show');
    });
});

// Usuarios
Route::middleware(['auth', 'can:manage-users'])->prefix('/usuarios')->group(function () {
    Route::get('/index', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::patch('/{id}/edit', [UsuarioController::class, 'update'])->name('usuarios.update');
    Route::get('/{id}/ban', [BanController::class, 'ban'])->name('usuarios.ban');
    Route::patch('/{id}/ban', [BanController::class, 'banned'])->name('usuarios.banned');
    Route::get('/baneados', [BanController::class, 'bans'])->name('usuarios.bans');
    Route::get('/{id}/desban', [BanController::class, 'desban'])->name('usuarios.desban');
    Route::patch('/{id}/desban', [BanController::class, 'desbanned'])->name('usuarios.desbanned');
});

// Publicaciones
Route::middleware(['auth', 'can:manage-publications'])->prefix('/publicaciones')->group(function () {
    Route::get('/index', [PublicacionController::class, 'index'])->name('publicacion.index');
    Route::get('/{id}/edit', [PublicacionController::class, 'edit'])->name('publicacion.edit');
    Route::patch('/{id}/edit', [PublicacionController::class, 'update'])->name('publicacion.update');
});

// Categorías
Route::middleware(['auth', 'can:manage-category'])->prefix('/categorias')->group(function () {
    Route::get('/index', [CategoriaController::class, 'index'])->name('categorias.index');
    Route::get('/create', [CategoriaController::class, 'create'])->name('categorias.create');
    Route::post('/create', [CategoriaController::class, 'store'])->name('categorias.store');
    Route::get('/{id}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
    Route::patch('/{id}/edit', [CategoriaController::class, 'update'])->name('categorias.update');
});

 //Rutas de Google OAuth
Route::prefix('/google-auth')->group(function () {
    Route::get('/redirect', function () {
        return Socialite::driver('google')->redirect();
    });
    Route::get('/callback', function () {
        $user_google = Socialite::driver('google')
            ->stateless()
            ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
            ->user();
        $user = User::updateOrCreate(
            ['google_id' => $user_google->id],
            [
                'name' => $user_google->name,
                'email' => $user_google->email,
                'avatar' => $user_google->avatar,
                'password' => bcrypt(str()->random(16)),
            ]
        );
        Auth::login($user);
        return redirect('/home');
    });
});


//Rutas de Actualización de Usuario
Route::middleware(['auth'])->group(function () {
    Route::match(['post', 'put'], '/usuario/actualizar-perfil', [UsuarioController::class, 'actualizarPerfil'])->name('usuario.actualizarPerfil');
    Route::post('/usuario/actualizar-foto-perfil', [UsuarioController::class, 'actualizarFoto'])->name('usuario.actualizarFotoPerfil');
});