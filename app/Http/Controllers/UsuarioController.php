<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::where('rol', '!=', 'Admin')->orderBy('id')->paginate(10);
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
    public function ban(string $id)
    {
        $usuario = User::find($id);
        return view('usuario.ban', compact('usuario'));
    }

    public function banned(Request $request, string $id)
    {
        $usuario = User::findOrFail($id);

        $tipo_ban = $request->ban_permanente == 1;
        $comentario = $request->comment;

        if ($tipo_ban){
            $usuario->update(['estado' => 'Baneado Permanentemente']);
            $usuario->ban(['comment' => $comentario ])->isPermanent();
        }
        else{
            $usuario->update(['estado' => 'Baneado Temporalmente']);
            $fecha_baneo = $request->input('fecha_baneo');
            $usuario->ban(['expired_at' => $fecha_baneo, 'comment' => $comentario])->isTemporary();
        }
        return redirect()->route('usuarios.index');
    }
}
