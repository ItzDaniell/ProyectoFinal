<?php

namespace App\Http\Controllers;

use App\Models\InformarProblema;
use App\Models\InformeProcesado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformeProcesadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informes = InformeProcesado::orderBy('id_informe_procesado', 'desc')->paginate(10);
        return view('informe_procesado.index', compact('informes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_informar_problema)
    {
        $informe = InformarProblema::where('id_informar_problema', $id_informar_problema)->first();
        return view('informe_procesado.create', compact('informe'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id_informar_problema)
    {
        $request->validate([
            'comentario' => 'required|max:2048',
        ]);

        $requestData = $request->except(['id_servicio_tecnico', 'id_informar_problema',  'estado']);
        $requestData['id_servicio_tecnico'] = Auth::id();
        $requestData['id_informar_problema'] = $id_informar_problema;

        $informe = InformarProblema::find($id_informar_problema);

        $informe->update(['estado' => 'Procesado']);
        $requestData['estado'] = 'Procesado';


        InformeProcesado::create($requestData);
        return redirect()->route('informes-problemas.index');
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
