<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Publicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, $slug)
    {
        $request->validate([
            'contenido' => 'required|max:300',
        ]);

        $publicacion = Publicacion::where('slug','=', $slug)->first();

        $requestData = $request->except(['id', 'id_publicacion']);
        $requestData['id'] = Auth::id();
        $requestData['id_publicacion'] = $publicacion->id_publicacion;

        Comentario::create($requestData);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Publicacion $publicacion)
    {
        $comentarios = $publicacion->comentarios()->with('users')->get();  // Traemos todos los comentarios con la relación de usuario
        return response()->json($comentarios);
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
