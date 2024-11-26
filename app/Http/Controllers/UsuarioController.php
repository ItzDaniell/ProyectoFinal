<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use LDAP\Result;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::where('rol', '!=', 'Administrador')->orderBy('id')->paginate(10);
        return view('usuario.index', compact('usuarios'));
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
        //
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
        $usuario = User::findOrFail($id);
        $roles = Role::where('name', '!=', 'Admin')->pluck('name')->toArray();

        return view('usuario.edit', compact('usuario', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuario = User::findOrFail($id);

        $request->validate([
            'rol' => 'required|exists:roles,name',
        ]);

        $rol = $request->rol;
        $usuario->update(['rol' => $request->input('rol')]);
        $usuario->syncRoles($rol);

        return redirect()->route('usuarios.index')->with('success', 'El rol del usuario ha sido actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function actualizarPerfil(Request $request)
{
    $request->validate([
        'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $user = Auth::user();

    if ($request->hasFile('profile_photo')) {
        // Subir la foto
        $path = $request->file('profile_photo')->store('profile_photos', 'public');

        // Actualizar las rutas en la base de datos
        $user->profile_photo_path = $path; // Ruta relativa para el almacenamiento
        $user->avatar = asset('storage/' . $path); // URL pública para la foto
    }

    $user->save();

    return back()->with('success', 'Foto de perfil actualizada con éxito.');
}


}
