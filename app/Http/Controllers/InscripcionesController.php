<?php

namespace App\Http\Controllers;

use App\Models\Conferencia;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InscripcionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inscripciones = Inscripcion::where('estado', 'Activo')->orderBy('id_inscripcion', 'desc')->paginate(10);
        return view('inscripcion.index', compact('inscripciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $slug)
    {
        $requestData = $request->except(['id_conferencia', 'id']);

        // Asigna el ID del usuario autenticado
        $requestData['id'] = Auth::id();

        // Recupera la conferencia usando el slug
        $conferencia = Conferencia::where('slug', $slug)->firstOrFail();

        // Asigna el ID de la conferencia
        $requestData['id_conferencia'] = $conferencia->id_conferencia;

        // Verifica si ya está inscrito en esta conferencia
        $existingInscription = Inscripcion::where('id', $requestData['id'])
            ->where('id_conferencia', $requestData['id_conferencia'])
            ->exists(); // Usamos exists() en vez de first() para una verificación más eficiente

        if ($existingInscription) {
            return redirect()->back()->with('error', 'Ya estás inscrito en esta conferencia.');
        }

        // Crea la nueva inscripción
        Inscripcion::create($requestData);

        // Redirige al usuario con el enlace de la conferencia
        return redirect()->back()->with('urlConferencia', $conferencia->URL);
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
