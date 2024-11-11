<?php

use App\Http\Controllers\PostInicioSesionController;
use App\Http\Controllers\PreRegistrationController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [PreRegistrationController::class, 'index'])->name('Index');
Route::get('/Contactanos', [PreRegistrationController::class, 'Contactanos'])->name('Contactanos');
Route::get('/SobreNosotros', [PreRegistrationController::class, 'SobreNosotros'])->name('SobreNosotros');
Route::get('/FAQ', [PreRegistrationController::class, 'FAQ'])->name('FAQ');
Route::get('/IniciarSesion', [PreRegistrationController::class, 'IniciarSesion'])->name('IniciarSesion');
Route::get('/Registrarse', [PreRegistrationController::class, 'Registrarse'])->name(name: 'Registrarse');
Route::get('/OlvidasteContraseña', [PreRegistrationController::class, 'OlvidasteContrasena'])->name('OlvidasteContraseña');

/*PostInicio*/
Route::get('/Home', [PostInicioSesionController::class, 'Home'])->name('Home');
Route::get('/Noticias', [PostInicioSesionController::class, 'Noticias'])->name('Noticias');
Route::get('/Conferencias', [PostInicioSesionController::class, 'Conferencias'])->name('Conferencias');
Route::get('/Configuracion', [PostInicioSesionController::class, 'ConfiguracionPerfil'])->name('Configuracion');
Route::get('/Configuracion/Seguridad', [PostInicioSesionController::class, 'ConfiguracionSeguridad'])->name('ConfiguracionSeguridad');
Route::get('/Configuracion/SesionesActivas', [PostInicioSesionController::class, 'ConfiguracionSesionesActivas'])->name('ConfiguracionSesionesActivas');
Route::get('/Configuracion/EliminarCuenta', [PostInicioSesionController::class, 'ConfiguracionEliminarCuenta'])->name('ConfiguracionEliminarCuenta');
Route::get('/PerfilUsuario', [PostInicioSesionController::class, 'PerfilUsuario'])->name('PerfilUsuario');

/*Conferencias*/


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/Home', function () {
        return view('PostRegistro.Home');
    })->name('Home');
});
