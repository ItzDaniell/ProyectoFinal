<?php

namespace App\Http\Controllers;

use App\Models\User;
use Cog\Laravel\Ban\Services\BanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BanController extends Controller
{
    // Funcion para mostrar la vista de Baneo
    public function ban(string $id)
    {
        $usuario = User::find($id);
        app(BanService::class)->deleteExpiredBans();
        return view('usuario.ban', compact('usuario'));
    }

    // Funcion para registrar el baneo
    public function banned(Request $request, string $id)
    {
        $usuario = User::findOrFail($id);
        $tipo_ban = $request->ban_permanente == 1;
        $comentario = $request->comment;

        if ($tipo_ban) {
            $usuario->update(['estado' => 'Baneado Permanentemente']);
            $usuario->ban(['comment' => $comentario])->isPermanent();
        } else {
            $usuario->update(['estado' => 'Baneado Temporalmente']);

            $dias_baneo = intval($request->input('dias_baneo'));

            if ($dias_baneo <= 0) {
                return back()->withErrors(['message' => 'Debes seleccionar una duración válida en días.']);
            }

            $fecha_expiracion = now()->addDays($dias_baneo);

            $usuario->ban([
                'expired_at' => $fecha_expiracion,
                'comment' => $comentario
            ])->isTemporary();
        }

        return redirect()->route('usuarios.index');
    }

    // Funcion para mostrar los usuarios baneados
    public function bans()
    {
        $usuarios = User::onlyBanned()->paginate(10);
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
        $usuario->bans()->delete();
        return redirect()->route('usuarios.bans');
    }

    public function showBan()
    {
        return view('baneado.banned');
    }

}
