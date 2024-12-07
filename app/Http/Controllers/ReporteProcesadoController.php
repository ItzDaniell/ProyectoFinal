<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
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
    public function create($id_reporte)
    {
        $reporte = Reporte::where('id_reporte', $id_reporte)->first();
        return view('reporte_procesado.create', compact('reporte'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id_reporte)
    {
        $request->validate([
            'comentario' => 'required|max:2048',
            'accion' => 'required|max:150',
        ]);

        $requestData = $request->except(['id_moderador', 'id_reporte', 'estado']);
        $requestData['id_moderador'] = Auth::id();
        $requestData['id_reporte'] = $id_reporte;

        $reporte = Reporte::find($id_reporte);

        if($request->accion == 'Ninguna acción a realizar'){
            $reporte->update(['estado' => 'Denegado']);
            $requestData['estado'] = 'Denegado';
        }
        else{
            $reporte->update(['estado' => 'Procesado']);
            $requestData['estado'] = 'Procesado';
        }

        ReporteProcesado::create($requestData);
        return redirect()->route('reportes.index');
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
    public function destroy(string $id_reporte)
    {
        //
    }
}
