<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categorias::all();
        return view('categoria.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|max:150|unique:categorias,descripcion',
        ]);

        $requestData = $request->all();
        Categorias::create($requestData);
        return redirect()->route('categorias.index');
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
    public function edit(string $id_categoria)
    {
        $categoria = Categorias::find($id_categoria);
        return view('categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_categoria)
    {
        $categoria = Categorias::findOrFail($id_categoria);
        $request->validate([
            'descripcion' => 'required|max:150',
        ]);

        $requestData = $request->all();

        $categoria->update($requestData);

        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_categoria)
    {
        $categoria = Categorias::find($id_categoria);

        if ($categoria) {
            $categoria->delete();

            return redirect()->route('categorias.index')->with('success', 'Categoría eliminada exitosamente');
        }

        return redirect()->route('categorias.index')->with('error', 'Categoría no encontrada');
    }
}
