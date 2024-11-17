<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noticias = Noticia::orderBy('id_noticia')->paginate(10);
        return view('noticia.index', compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categorias::all();
        return view('noticia.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_categoria' => 'required',
            'titulo' => 'required|max:150',
            'autor' => 'required|max:150',
            'descripcion' => 'required|max:300',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'URL' => 'nullable|url|max:300',
        ]);
    
        // Procesar la carga del archivo de imagen si existe
        $requestData = $request->all();
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('imagenes', 'public');
            $requestData['imagen'] = $path;
        }
    
        // Crear la noticia con los datos procesados
        Noticia::create($requestData);
        return redirect()->route('noticias.index')->with('success', 'Noticia agregada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_noticia)
    {   
        $categorias = Categorias::all();
        $noticia = Noticia::find($id_noticia);
        return view('noticia.edit', compact('noticia'),
                                                compact('categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_noticia)
    {
        $noticia = Noticia::findOrFail($id_noticia);

        $request->validate([
            'id_categoria' => 'required',
            'titulo' => 'required|max:150',
            'autor' => 'required|max:150',
            'descripcion' => 'required|max:300',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'URL' => 'nullable|url|max:300',
            'estado' => 'required'
        ]);
    
        $requestData = $request->all();
    
        if ($request->hasFile('imagen')) {

            if ($noticia->imagen && Storage::exists('public/' . $noticia->imagen)) {
                Storage::delete('public/' . $noticia->imagen);
            }

            $path = $request->file('imagen')->store('imagenes', 'public');
            $requestData['imagen'] = $path;
        }
    
        $noticia->update($requestData);
    
        return redirect()->route('noticias.index')->with('success', 'Noticia actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
