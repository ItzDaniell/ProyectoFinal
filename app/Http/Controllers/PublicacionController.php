<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Publicacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categorias = Categorias::all();
        $categoria = $request->input('categoria', null);
        $busqueda = $request->input('busqueda', null);

        if ($busqueda) {
            $publicaciones = Publicacion::where('titulo', 'LIKE', '%' . $busqueda . '%')
                ->orderBy('id_publicacion', 'desc')
                ->paginate(10);
            return view('publicacion.index', compact('publicaciones', 'categorias', 'busqueda', 'categoria'));
        } elseif ($categoria) {
            if ($categoria == '0') {
                $publicaciones = Publicacion::orderBy('id_publicacion')->paginate(10);
            } else {
                $publicaciones = Publicacion::join('categorias', 'publicaciones.id_categoria', '=', 'categorias.id_categoria')
                    ->where('categorias.descripcion', $categoria)
                    ->orderBy('id_publicacion', 'desc')
                    ->select('publicaciones.*', 'categorias.descripcion as categoria_descripcion')
                    ->paginate(10);
            }
            return view('publicacion.index', compact('publicaciones', 'categorias', 'busqueda', 'categoria'));
        } else {
            $publicaciones = Publicacion::orderBy('id_publicacion', 'desc')->paginate(10);
            return view('publicacion.index', compact('publicaciones', 'categorias', 'busqueda', 'categoria'));
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $request->validate([
            'titulo' => 'required|string|max:150',
            'descripcion' => 'required|string|max:301',
            'id_categoria' => 'required|exists:categorias,id_categoria',
            'archivo' => 'required|file|mimes:jpg,jpeg,png,pdf,rar,zip|max:10240',
            'URL' => 'nullable|url',
        ]);

        $requestData = $request->except(['id', 'archivo']);
        $requestData['id'] = Auth::id();

        if ($request->hasFile('archivo')) {
            $path = $request->file('archivo')->store('archivos', 'public');
            $requestData['archivo'] = $path;
        }

        Publicacion::create($requestData);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_publicacion)
    {
        $publicacion = Publicacion::find($id_publicacion);
        return view('publicacion.show', compact('publicacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_publicacion)
    {
        $publicacion = Publicacion::findOrFail($id_publicacion);
        return view('publicacion.edit', compact('publicacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_publicacion)
    {
        $publicacion = Publicacion::findOrFail($id_publicacion);

        $request->validate([
            'estado' => 'required',
        ]);

        $publicacion->update(['estado' => $request->input('estado')]);
        return redirect()->route('publicacion.index')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
