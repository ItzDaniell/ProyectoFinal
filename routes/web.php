<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BanController,
    CategoriaController,
    ComentarioController,
    ConferenciaController,
    InformarProblemaController,
    InformeProcesadoController,
    InscripcionesController,
    NoticiaController,
    PonenteController,
    PostInicioSesionController,
    PreInicioSesionController,
    PublicacionController,
    ReporteController,
    ReporteProcesado,
    ReporteProcesadoController,
    ReporteResueltoController,
    ReportesController,
    UsuarioController,
    EnviarSolicitudController,
    HomeController,
};

use App\Http\Controllers\Auth\SetPasswordController;
use App\Http\Controllers\Auth\GoogleAuthController;
use Cog\Laravel\Ban\Http\Middleware\ForbidBannedUser;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Spatie\Permission\Models\Role;

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
    Route::get('/home/{busqueda?}/{categoria?}', [PostInicioSesionController::class, 'Home'])->name('Home');
    Route::get('/noticias/{busqueda?}/{categoria?}', [PostInicioSesionController::class, 'Noticias'])->name('Noticias');
    Route::get('/noticia/{titulo}', [PostInicioSesionController::class, 'DetalleNoticia'])->name('DetalleNoticia');
    Route::get('/conferencias', [PostInicioSesionController::class, 'Conferencias'])->name('Conferencias');
    Route::get('/autocomplete', [PostInicioSesionController::class, 'autocomplete'])->name('autocomplete');
    Route::prefix('/configuracion')->group(function () {
        Route::get('/', [PostInicioSesionController::class, 'ConfiguracionPerfil'])->name('Configuracion');
        Route::get('/seguridad', [PostInicioSesionController::class, 'ConfiguracionSeguridad'])->name('ConfiguracionSeguridad');
        Route::get('/sesiones-activas', [PostInicioSesionController::class, 'ConfiguracionSesionesActivas'])->name('ConfiguracionSesionesActivas');
        Route::get('/eliminar-cuenta', [PostInicioSesionController::class, 'ConfiguracionEliminarCuenta'])->name('ConfiguracionEliminarCuenta');
    });

    Route::get('/conferencia/{slug}', [PostInicioSesionController::class, 'DetalleConferencia'])->name('DetalleConferencia');
    Route::get('/publicacion/{slug}/comentarios', [PostInicioSesionController::class, 'PublicacionComentarios'])->name('PublicacionComentarios');
    Route::get('/perfil-usuario/{slug?}', [PostInicioSesionController::class, 'PerfilUsuario'])->name('PerfilUsuario');
    Route::post('/reporte/{slug}/store', [ReporteController::class, 'store'])->name('reportes.store');
    Route::post('/comentario/{slug}/store', [ComentarioController::class, 'store'])->name('comentarios.store');
    Route::post('/publicacion/store', [PublicacionController::class, 'store'])->name('publicacion.store');
    Route::post('/informe-problema/store', [InformarProblemaController::class, 'store'])->name('informes.store');
    Route::post('/inscripcion/{slug}', [InscripcionesController::class, 'store'])->name('inscripcion.store');
});


//Rutas de Gestión (Protegidas con Permisos Específicos)
// Noticias
Route::middleware(['auth', 'can:manage-news', ForbidBannedUser::class])->prefix('/administracion/noticias')->group(function () {
    Route::get('/index', [NoticiaController::class, 'index'])->name('noticias.index');
    Route::get('/create', [NoticiaController::class, 'create'])->name('noticias.create');
    Route::post('/create', [NoticiaController::class, 'store'])->name('noticias.store');
    Route::get('/{id}/edit', [NoticiaController::class, 'edit'])->name('noticias.edit');
    Route::patch('/{id}/edit', [NoticiaController::class, 'update'])->name('noticias.update');
});

// Conferencias y Ponentes
Route::middleware(['auth', 'can:manage-conferences', ForbidBannedUser::class])->prefix('/administracion/conferencias')->group(function () {
    Route::get('/index', [ConferenciaController::class, 'index'])->name('conferencias.index');
    Route::get('/create', [ConferenciaController::class, 'create'])->name('conferencias.create');
    Route::post('/create', [ConferenciaController::class, 'store'])->name('conferencias.store');
    Route::get('/{id}/edit', [ConferenciaController::class, 'edit'])->name('conferencias.edit');
    Route::patch('/{id}/edit', [ConferenciaController::class, 'update'])->name('conferencias.update');
});

Route::middleware(['auth', 'can:manage-conferences', ForbidBannedUser::class])->prefix('/administracion/ponentes')->group(function () {
    Route::get('/index', [PonenteController::class, 'index'])->name('ponentes.index');
    Route::get('/create', [PonenteController::class, 'create'])->name('ponentes.create');
    Route::post('/create', [PonenteController::class, 'store'])->name('ponentes.store');
    Route::get('/{id}/edit', [PonenteController::class, 'edit'])->name('ponentes.edit');
    Route::patch('/{id}/edit', [PonenteController::class, 'update'])->name('ponentes.update');
    Route::get('/autocomplete-ponentes', [PonenteController::class, 'getPonentes'])->name('ponentes.list');
});


// Usuarios
Route::middleware(['auth', 'can:manage-users', ForbidBannedUser::class])->prefix('/administracion/usuarios')->group(function () {
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
Route::middleware(['auth', 'can:manage-publications', ForbidBannedUser::class])->prefix('/administracion/publicaciones')->group(function () {
    Route::get('/index', [PublicacionController::class, 'index'])->name('publicacion.index');
    Route::get('/{id}/edit', [PublicacionController::class, 'edit'])->name('publicacion.edit');
    Route::patch('/{id}/edit', [PublicacionController::class, 'update'])->name('publicacion.update');
});

// Categorías
Route::middleware(['auth', 'can:manage-category', ForbidBannedUser::class])->prefix('/administracion/categorias')->group(function () {
    Route::get('/index', [CategoriaController::class, 'index'])->name('categorias.index');
    Route::get('/create', [CategoriaController::class, 'create'])->name('categorias.create');
    Route::post('/create', [CategoriaController::class, 'store'])->name('categorias.store');
    Route::get('/{id}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
    Route::patch('/{id}/edit', [CategoriaController::class, 'update'])->name('categorias.update');
    Route::delete('/categorias/{id_categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
});

Route::middleware(['auth', 'can:manage-reports', ForbidBannedUser::class])->prefix('/administracion/reportes')->group(function () {
    Route::get('/index', [ReporteController::class, 'index'])->name('reportes.index');
});

Route::middleware(['auth', 'can:manage-reports', ForbidBannedUser::class])->prefix('/administracion/reportes-procesados')->group(function () {
    Route::get('/index', [ReporteProcesadoController::class, 'index'])->name('reportes-procesados.index');
    Route::get('{id}/create', [ReporteProcesadoController::class, 'create'])->name('reportes-procesados.create');
    Route::post('{id}/store', [ReporteProcesadoController::class, 'store'])->name('reportes-procesados.store');
});

Route::middleware(['auth', 'can:manage-requests'])->prefix('/administracion/informes-problemas')->group(function () {
    Route::get('/index', [InformarProblemaController::class, 'index'])->name('informes-problemas.index');
});

Route::middleware(['auth', 'can:manage-requests', ForbidBannedUser::class])->prefix('/administracion/informes-procesados')->group(function () {
    Route::get('/index', [InformeProcesadoController::class, 'index'])->name('informes-procesados.index');
    Route::get('{id}/create', [InformeProcesadoController::class, 'create'])->name('informes-procesados.create');
    Route::post('{id}/store', [InformeProcesadoController::class, 'store'])->name('informes-procesados.store');
});

Route::middleware(['auth', 'can:manage-inscriptions', ForbidBannedUser::class])->prefix('/administracion/inscripciones')->group(function () {
    Route::get('/index', [InscripcionesController::class, 'index'])->name('informes-problemas.index');
});

Route::middleware(['auth', 'can:manage-comments', ForbidBannedUser::class])->prefix('/administracion/comentarios')->group(function () {
    Route::get('/index', [ComentarioController::class, 'index'])->name('comentarios.index');
    Route::get('/{id}/edit', [ComentarioController::class, 'edit'])->name('comentarios.edit');
    Route::patch('/{id}/edit', [ComentarioController::class, 'update'])->name('comentarios.update');
});

 //Rutas de Google OAuth
 Route::prefix('/google-auth')->group(function () {
     Route::get('/redirect', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.redirect');
     Route::get('/callback', [GoogleAuthController::class, 'handleGoogleCallback'])->name('google.callback');
 });


//Rutas de Actualización de Usuario
Route::middleware(['auth', ForbidBannedUser::class])->group(function () {
    Route::match(['post', 'put'], '/usuario/actualizar-perfil', [UsuarioController::class, 'actualizarPerfil'])->name('usuario.actualizarPerfil');
    Route::post('/usuario/actualizar-foto-perfil', [UsuarioController::class, 'actualizarFoto'])->name('usuario.actualizarFotoPerfil');
});

Route::middleware(['auth', 'can:gestion', ForbidBannedUser::class])->group(function () {
    Route::get('/administracion', [PostInicioSesionController::class, 'administracion'])->name('Administracion');
});



Route::post('/enviar-solicitud', [UsuarioController::class, 'enviarSolicitud'])->name('enviar.solicitud');
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::post('/save-password', [UsuarioController::class, 'savePassword'])->name('password.save')->middleware('auth');
