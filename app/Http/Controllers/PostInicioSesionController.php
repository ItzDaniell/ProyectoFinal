<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostInicioSesionController extends Controller
{
    public function Home(){
        return view('PostRegistro.Home');
    }
    public function Noticias(){
        return view('PostRegistro.Noticias');
    }
    public function Conferencias(){
        return view('PostRegistro.Conferencias');
    }
    public function ConfiguracionPerfil(){
        return view('PostRegistro.ConfiguracionPerfil');
    }
    public function ConfiguracionSeguridad(){
        return view('PostRegistro.ConfiguracionSeguridad');
    }
    public function ConfiguracionSesionesActivas(){
        return view('PostRegistro.ConfiguracionSesionesActivas');
    }
    public function ConfiguracionEliminarCuenta(){
        return view('PostRegistro.ConfiguracionEliminarCuenta');
    }
    public function PerfilUsuario(){
        return view('PostRegistro.PerfilUsuario');
    }
}
