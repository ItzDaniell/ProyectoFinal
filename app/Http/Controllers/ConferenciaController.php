<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Conferencia;
use App\Models\Ponente;
use Illuminate\Http\Request;

class ConferenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conferencias = Conferencia::orderBy('id_conferencia')->paginate(10);
        return view('conferencia.index', compact('conferencias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categorias::all();
        $ponentes = Ponente::all();
        return view('conferencia.create', compact('categorias', 'ponentes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:300',
            'id_categoria' => 'required',
            'id_ponente' => 'required',
            'descripcion' => 'required',
            'duracion' => 'required',
            'fecha_hora_inicio' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'URL' => 'required|url',
        ]);

        $requestData = $request->all();
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('imagenes', 'public');
            $requestData['imagen'] = $path;
        }

        Conferencia::create($requestData);
        return redirect()->route('conferencias.index');
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
