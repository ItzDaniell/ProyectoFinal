<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Conferencia;
use App\Models\Noticia;
use App\Models\Publicacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostInicioSesionController extends Controller
{   
    public function Home(Request $request)
    {
        $categorias = Categorias::all();
        $categoria = $request->input('categoria', null);
        $busqueda = $request->input('busqueda', null);
        
        if ($busqueda) {
            $publicaciones = Publicacion::where('titulo', 'LIKE', '%' . $busqueda . '%')
                ->orderBy('id_publicacion')
                ->paginate(10);
            return view('PostInicioSesion.Home', compact('publicaciones', 'categorias', 'busqueda', 'categoria'));
        } elseif ($categoria) {
            if ($categoria == '0') {
                $publicaciones = Publicacion::orderBy('id_publicacion')->paginate(10);
            } else {
                $publicaciones = Publicacion::join('categorias', 'publicaciones.id_categoria', '=', 'categorias.id_categoria')
                    ->where('categorias.descripcion', $categoria)
                    ->orderBy('id_publicacion')
                    ->paginate(10);
            }
            return view('PostInicioSesion.Home', compact('publicaciones', 'categorias', 'busqueda', 'categoria'));
        } else {
            $publicaciones = Publicacion::orderBy('id_publicacion')->paginate(10);
            return view('PostInicioSesion.Home', compact('publicaciones', 'categorias', 'busqueda', 'categoria'));
        }        
    }
    public function Noticias(Request $request){
        $categorias = Categorias::all();
        $categoria = $request->input('categoria', null);
        $busqueda = $request->input('busqueda', null);

        if ($busqueda) {
            $noticias = Noticia::where('titulo', 'LIKE', '%' . $busqueda . '%')
                    ->where('estado', 'Activo')
                    ->orderBy('id_noticia')
                    ->paginate(10);
            $ultimaNoticia = Noticia::where('titulo', 'LIKE', '%' . $busqueda . '%')
                                    ->where('estado', 'Activo')
                                    ->latest()->first();
            return view('PostInicioSesion.Home', compact('noticias', 'categorias', 'busqueda', 'categoria'));
        }
        elseif ($categoria) {
            if ($categoria == '0') {
                $publicaciones = Publicacion::orderBy('id_publicacion')->paginate(10);
            } else {
                $publicaciones = Publicacion::join('categorias', 'publicaciones.id_categoria', '=', 'categorias.id_categoria')
                ->where('categorias.descripcion', $categoria)
                ->orderBy('id_publicacion')
                ->select('publicaciones.*', 'categorias.descripcion as categoria_descripcion')
                ->paginate(10);
            }
            return view('PostInicioSesion.Home', compact('publicaciones', 'categorias', 'busqueda', 'categoria'));
        } 
        else {
            $noticias = Noticia::where('estado', 'Activo')->get();
            $ultimaNoticia = Noticia::where('estado', 'Activo')->latest()->first();
            return view('PostInicioSesion.Noticias', compact('noticias', 'categorias', 'ultimaNoticia'));
        }
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
    public function PerfilUsuario($id = null){
        return view('PostInicioSesion.PerfilUsuario', compact('usuario'));
    }
}
