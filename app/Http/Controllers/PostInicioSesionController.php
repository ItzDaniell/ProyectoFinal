<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Comentario;
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
        $comentarios = Comentario::where('estado', 'Activo')->orderBy('id_publicacion, desc');

        if ($busqueda) {
            $publicaciones = Publicacion::where('slug', 'LIKE', '%' . $busqueda . '%')
                ->where('estado', 'Activo')
                ->orderBy('id_publicacion', 'desc')
                ->paginate(10);
            return view('PostInicioSesion.Home', compact('publicaciones', 'categorias', 'busqueda', 'categoria', 'comentarios'));
        } elseif ($categoria) {
            if ($categoria == '0') {
                $publicaciones = Publicacion::orderBy('id_publicacion')->paginate(10);
            } else {
                $publicaciones = Publicacion::join('categorias', 'publicaciones.id_categoria', '=', 'categorias.id_categoria')
                    ->where('categorias.descripcion', $categoria)
                    ->where('estado', 'Activo')
                    ->orderBy('id_publicacion', 'desc')
                    ->select('publicaciones.*', 'categorias.descripcion as categoria_descripcion')
                    ->paginate(10);
            }
            return view('PostInicioSesion.Home', compact('publicaciones', 'categorias', 'busqueda', 'categoria', 'comentarios'));
        } else {
            $publicaciones = Publicacion::orderBy('id_publicacion', 'desc')->where('estado', 'Activo')->paginate(10);
            return view('PostInicioSesion.Home', compact('publicaciones', 'categorias', 'busqueda', 'categoria', 'comentarios'));
        }
    }

    public function Noticias(Request $request){
        $categorias = Categorias::all();
        $categoria = $request->input('categoria', null);
        $busqueda = $request->input('busqueda', null);

        if ($busqueda) {
            $noticias = Noticia::where('slug', 'LIKE', '%' . $busqueda . '%')
                ->where('estado', 'Activo')
                ->orderBy('id_noticia', 'desc')
                ->paginate(10);
            return view('PostInicioSesion.Noticias', compact('noticias', 'categorias', 'busqueda', 'categoria'));
        } elseif ($categoria) {
            if ($categoria == '0') {
                $noticias = Noticia::orderBy('id_noticia')->paginate(10);
            } else {
                $noticias = Noticia::join('categorias', 'noticias.id_categoria', '=', 'categorias.id_categoria')
                            ->where('categorias.descripcion', $categoria)
                            ->where('estado', 'Activo')
                            ->orderBy('id_noticia', 'desc')
                            ->select('noticias.*', 'categorias.descripcion as categoria_descripcion')
                            ->paginate(10);
            }
            return view('PostInicioSesion.Noticias', compact('noticias', 'categorias', 'busqueda', 'categoria'));
        } else {
            $noticias = Noticia::orderBy('id_noticia', 'desc')->where('estado', 'Activo')->paginate(10);
            return view('PostInicioSesion.Noticias', compact('noticias', 'categorias', 'busqueda', 'categoria'));
        }
    }
    public function Conferencias(Request $request)
    {
        $categorias = Categorias::all();
        $categoria = $request->input('categoria', null);
        $busqueda = $request->input('busqueda', null);

        if ($busqueda) {
            $conferencias = Conferencia::where('slug', 'LIKE', '%' . $busqueda . '%')
                ->where('estado', 'Activo')
                ->orderBy('id_conferencia', 'desc')
                ->paginate(10);
            return view('PostInicioSesion.Conferencias', compact('conferencias', 'categorias', 'busqueda', 'categoria'));
        } elseif ($categoria) {
            if ($categoria == '0') {
                $conferencias = Conferencia::orderBy('id_conferencia')->paginate(10);
            } else {
                $conferencias = Conferencia::join('categorias', 'conferencias.id_categoria', '=', 'categorias.id_categoria')
                            ->where('categorias.descripcion', $categoria)
                            ->where('estado', 'Activo')
                            ->orderBy('id_conferencia', 'desc')
                            ->select('conferencias.*', 'categorias.descripcion as categoria_descripcion')
                            ->paginate(10);
            }
            return view('PostInicioSesion.Conferencias', compact('conferencias', 'categorias', 'busqueda', 'categoria'));
        } else {
            $conferencias = Conferencia::orderBy('id_conferencia', 'desc')->where('estado', 'Activo')->paginate(10);
            return view('PostInicioSesion.Conferencias', compact('conferencias', 'categorias', 'busqueda', 'categoria'));
        }
    }
    public function DetalleNoticia($titulo)
    {
        $titulo = urldecode($titulo);
        $noticia = Noticia::where('titulo', $titulo)->firstOrFail();
        return view('PostInicioSesion.DetallesNoticia', compact('noticia'));
    }
    public function PublicacionComentarios($slug)
    {
        $publicacion = Publicacion::where('slug', $slug)->first();

        $comentarios = Comentario::where('id_publicacion', $publicacion->id_publicacion)->get();

        return view('PostInicioSesion.PublicacionComentarios', compact('publicacion', 'comentarios'));
    }

    public function DetalleConferencia($slug)
    {
        $conferencia = Conferencia::where('slug', $slug)->first();

        $usuario = Auth::user();
        $yaInscrito = false;

        if ($usuario) {
            $yaInscrito = $conferencia->inscripcion()->where('id', $usuario->id)->exists();
        }

        return view('PostInicioSesion.DetallesConferencia', compact('conferencia', 'yaInscrito'));
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

    public function PerfilUsuario($slug = null)
    {
        if ($slug === null) {
            $usuario = Auth::user();
        } else {
            $usuario = User::where('slug', $slug)->first();
        }
        return view('PostInicioSesion.PerfilUsuario', compact('usuario'));
    }

    public function autocomplete(Request $request)
    {
        $query = $request->input('query');

        $resultado = User::where('name', 'LIKE', "%{$query}%")
                          ->where('id', '!=', Auth::id())
                          ->where('rol', '!=', 'Administrador')
                          ->select('name', 'profile_photo_path', 'avatar', 'slug')
                          ->limit(5)
                          ->get();

        return response()->json($resultado);
    }
}
