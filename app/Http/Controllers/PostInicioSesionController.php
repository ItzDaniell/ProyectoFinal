<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Conferencia;
use App\Models\Noticia;
use App\Models\Publicacion;
use Illuminate\Http\Request;

class PostInicioSesionController extends Controller
{
    public function Home(){
        $publicaciones = Publicacion::where('estado', 'Activo')->get();
        $categorias = Categorias::all();
        return view('PostInicioSesion.Home', compact('publicaciones', 'categorias'));
    }
    public function Noticias(){
        $noticias = Noticia::where('estado', 'Activo')->get();
        $ultimaNoticia = Noticia::where('estado', 'Activo')->latest()->first();
        $categorias = Categorias::all();
        return view('PostInicioSesion.Noticias', compact('noticias', 'categorias', 'ultimaNoticia'));
    }
    public function Conferencias(){
        $conferencias = Conferencia::where('estado', 'Activo')->get();
        $categorias = Categorias::all();
        return view('PostInicioSesion.Conferencias', compact('conferencias', 'categorias'));
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
