<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Noticia;
use Illuminate\Http\Request;

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
        return view('producto.create', compact('categorias'));
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
            'imagen' => 'required|max:300',
            'URL' => 'required|max:300',
            'estado' => 'required'
        ]);
        Noticia::create($request->all());
        return redirect()->route('noticia.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
