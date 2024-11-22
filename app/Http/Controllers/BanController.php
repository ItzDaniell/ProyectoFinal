<?php

namespace App\Http\Controllers;

use App\Models\User;
use Cog\Laravel\Ban\Models\Ban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BanController extends Controller
{
    // Funcion para mostrar la vista de Baneo
    public function ban(string $id)
    {
        $usuario = User::find($id);
        return view('usuario.ban', compact('usuario'));
    }

    // Funcion para registrar el baneo
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

    // Funcion para mostrar los usuarios baneados
    public function bans()
    {
        $usuarios = User::onlyBanned()->get();
        return view('baneado.index', compact('usuarios'));
    }

    // Funcion mostrar la vista de Desbaneo
    public function desban(string $id)
    {
        $usuario = User::find($id);
        $ban = $usuario->bans()->latest()->first();
        return view('baneado.edit', compact('usuario', 'ban'));
    }

    // Funcion para registrar el desbaneo
    public function desbanned(Request $request, string $id)
    {   
        $request->validate([
            'CheckDesbaneo' => 'required',
        ]);

        $usuario = User::findOrFail($id);

        $usuario->update(['estado' => 'Activo']);
        $usuario->unban();
        return redirect()->route('usuarios.bans');
    }

    public function showBan()
    {
        $user = Auth::user(); 
    // Obtén al usuario autenticado

    // Verifica si el usuario está baneado
        if ($user && $user->isBanned()) {
            // Obtén los detalles del baneo (por ejemplo, razón, fecha, etc.)
            $banReason = $user->ban_reason; // Asegúrate de que este campo esté definido en tu base de datos
            $banDate = $user->banned_at; // Si el paquete guarda la fecha de baneo

            // Crea la vista de baneado pasando los datos del baneo
            $view = view('baneado.banned')
                ->with('message', 'This account is blocked.')
                ->with('user', $user)
                ->with('banReason', $banReason)
                ->with('banDate', $banDate);

            // Devuelve la vista con el código de respuesta 403
            return response($view, 403);
        }

        // Si el usuario no está baneado, muestra la vista normal
        return view('home'); // O cualquier otra vista que elijas
    }
}
