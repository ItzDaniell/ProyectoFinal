<?php

namespace App\Http\Controllers;

use App\Models\Ponente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PonenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ponentes = Ponente::orderBy('id_ponente')->paginate(10);
        return view('ponente.index', compact('ponentes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ponente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|max:150',
            'correo' => 'required|max:150',
            'biografia' => 'required|max:300',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $requestData = $request->all();
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('imagenes', 'public');
            $requestData['foto'] = $path;
        }

        Ponente::create($requestData);
        return redirect()->route('ponentes.index')->with('success', 'Ponente agregado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_ponente)
    {
        $ponente = Ponente::find($id_ponente);
        return view('ponente.show', compact('ponente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_ponente)
    {
        $ponente = Ponente::find($id_ponente);
        return view('ponente.edit', compact('ponente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_ponente)
    {
        $ponente = Ponente::findOrFail($id_ponente);

        $request->validate([
            'nombres' => 'required|max:100',
            'correo' => 'required|email|max:300',
            'biografia' => 'required|max:2048',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $requestData = $request->all();

        if ($request->hasFile('foto')) {

            if ($ponente->foto && Storage::exists('public/' . $ponente->foto)) {
                Storage::delete('public/' . $ponente->foto);
            }
                $path = $request->file('foto')->store('fotos', 'public');
                $requestData['foto'] = $path;
            }

            $ponente->update($requestData);

            return redirect()->route('ponentes.index')->with('success', 'Ponente actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_ponente)
    {
        Ponente::find($id_ponente)->delete();
        return redirect()->route('ponentes.index');
    }
}
