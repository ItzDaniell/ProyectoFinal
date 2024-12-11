<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;



class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::where('id', '!=', Auth::id())
                        ->where('rol', '!=', 'Administrador')
        ->paginate(10);

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

        // Valida que el rol sea obligatorio y exista en la tabla de roles
        $request->validate([
            'rol' => 'required|exists:roles,name',
        ]);

        // Obtén el rol del request
        $rol = $request->input('rol');

        // Actualiza el rol en Spatie Permission
        $usuario->syncRoles($rol); // Esto asegura que el rol sea sincronizado correctamente

        // Opcional: si tienes un campo 'rol' en tu tabla 'users', actualízalo manualmente
        $usuario->update(['rol' => $rol]);

        // Redirige con éxito
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
        // Validar los datos
        $request->validate([
            'presentacion' => 'nullable|string|max:255', // Presentación opcional, máximo 255 caracteres
            'biografia' => 'nullable|string|max:1000',  // Biografía opcional, máximo 1000 caracteres
        ]);

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Actualizar los campos
        $user->presentacion = $request->input('presentacion');
        $user->biografia = $request->input('biografia');
        $user->save();

        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success');
    }
    public function actualizarFoto(Request $request)
    {
        if ($request->hasFile('profile_photo')) {
            // Generar un nombre de archivo único
            $fileName = Str::random(10) . '.' . $request->file('profile_photo')->getClientOriginalExtension();
            // Mover la foto a la carpeta publica
            $request->file('profile_photo')->move(public_path('storage/Foto_Usuario'), $fileName);
            // Generar la URL pública
            $publicUrl = asset('storage/Foto_Usuario/' . $fileName);
            // Actualizar la información del usuario
            Auth::user()->update([
                'profile_photo_path' => 'storage/Foto_Usuario/' . $fileName,
                'avatar' => $publicUrl,
            ]);
        }

        return redirect()->back()->with('success');
    }

    public function savePassword(Request $request)
    {
        // Validar la entrada
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Actualizar la contraseña
        $user->password = Hash::make($request->password);
        $user->save();

        // Reautenticar al usuario para evitar que lo redirija al login
        Auth::login($user);

        // Redirigir al home con un mensaje de éxito
        return redirect()->route('home')->with('success', 'Contraseña configurada correctamente.');
    }

}
