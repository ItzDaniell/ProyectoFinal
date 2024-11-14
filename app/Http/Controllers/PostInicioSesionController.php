<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostInicioSesionController extends Controller
{
    public function Home(){
        return view('PostInicioSesion.Home');
    }
    public function Noticias(){
        return view('PostInicioSesion.Noticias');
    }
    public function Conferencias(){
        return view('PostInicioSesion.Conferencias');
    }
    public function ConfiguracionPerfil(){
        return view('PostInicioSesion.ConfiguracionPerfil');
    }
    public function ConfiguracionSeguridad(){
        return view('PostInicioSesion.ConfiguracionSeguridad');
    }
    public function ConfiguracionSesionesActivas(){
        return view('PostInicioSesion.ConfiguracionSesionesActivas');
    }
    public function ConfiguracionEliminarCuenta(){
        return view('PostInicioSesion.ConfiguracionEliminarCuenta');
    }
    public function PerfilUsuario(){
        return view('PostInicioSesion.PerfilUsuario');
    }
}
