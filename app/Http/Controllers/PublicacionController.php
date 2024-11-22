<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Publicacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publicaciones = Publicacion::orderBy('id_publicacion')->paginate(10);
        return view('publicacion.index', compact('publicaciones'));
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
            'id_categoria' => 'required|integer',
            'titulo' => 'required|max:150',
            'descripcion' => 'nullable|max:2048',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $requestData = $request->except('id');
        $requestData['id'] = Auth::id();
        
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('imagenes', 'public');
            $requestData['imagen'] = $path;
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
