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
        // Exclude 'id_conferencia' and 'id' from the request data
        $requestData = $request->except(['id_conferencia', 'id']);

        // Set the 'id' to the authenticated user's ID
        $requestData['id'] = Auth::id();

        // Retrieve the conference by its slug (fetch the first result)
        $conferencia = Conferencia::where('slug', $slug)->firstOrFail();  // Use firstOrFail() to ensure conference exists

        // Set the 'id_conferencia' in the request data
        $requestData['id_conferencia'] = $conferencia->id_conferencia;

        // Create the new Inscripcion record
        Inscripcion::create($requestData);

        // Redirect back to the previous page, passing the conference URL
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
