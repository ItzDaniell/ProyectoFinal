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
                ->where('estado', 'Activo')
                ->orderBy('id_publicacion', 'desc')
                ->paginate(10);
            return view('PostInicioSesion.Home', compact('publicaciones', 'categorias', 'busqueda', 'categoria'));
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
            return view('PostInicioSesion.Home', compact('publicaciones', 'categorias', 'busqueda', 'categoria'));
        } else {
            $publicaciones = Publicacion::orderBy('id_publicacion', 'desc')->where('estado', 'Activo')->paginate(10);
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
    public function DetalleNoticia($titulo)
    {
        $titulo = urldecode($titulo);
        $noticia = Noticia::where('titulo', $titulo)->firstOrFail();
        return view('PostInicioSesion.DetallesNoticia', compact('noticia'));
    }

    public function Conferencias(Request $request)
    {
        $categorias = Categorias::all(); // Obtener todas las categorías
        $categoria = $request->input('categoria', null); // Categoría seleccionada (o null si no hay)
        $busqueda = $request->input('busqueda', null); // Término de búsqueda (o null si no hay)

        $query = Conferencia::query();

        if ($busqueda) {
            $query->where('titulo', 'LIKE', '%' . $busqueda . '%');
        }

        if ($categoria) {
            if ($categoria != '0') {
                $query->whereHas('categoria', function ($q) use ($categoria) {
                    $q->where('descripcion', $categoria);
                });
            }
        }

        $conferencias = $query->orderBy('id_conferencia', 'desc')->paginate(10);

        return view('PostInicioSesion.Conferencias', compact('conferencias', 'categorias', 'busqueda', 'categoria'));
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
                          ->select('name', 'profile_photo_path', 'avatar', 'slug')
                          ->limit(5)
                          ->get();

        return response()->json($resultado);
    }

}
