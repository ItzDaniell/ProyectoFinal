<?php

namespace App\Http\Controllers;

use App\Models\ReporteProcesado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReporteProcesadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reportes = ReporteProcesado::orderBy('id_reporte_procesado', 'desc')->paginate(10);
        return view('reporte_procesado.index', compact('reportes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reporte_procesado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id_reporte)
    {
        $request->validate([
            'comentario' => 'required|max:2048',
            'accion' => 'required|max:150',
            'estado' => 'required|max:100'
        ]);

        $reporte = Reporte::findOrFail($id_reporte);

        $requestData = $request->except('id_moderador');
        $requestData['id_moderador'] = Auth::id();

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('imagenes', 'public');
            $requestData['imagen'] = $path;
        }

        ReporteProcesado::create($requestData);
        return redirect()->route('reporte_procesado.index');
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
