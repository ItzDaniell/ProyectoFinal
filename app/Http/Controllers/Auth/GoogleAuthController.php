<?php

namespace App\Http\Controllers\Auth;

use GuzzleHttp\Client;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Spatie\Permission\Models\Role;

class GoogleAuthController extends Controller
{
    /**
     * Redirige al usuario a la página de autenticación de Google.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Maneja el callback de autenticación de Google.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleGoogleCallback()
    {
        try {
            // Obtiene la información del usuario desde Google
            $googleUser = Socialite::driver('google')
                ->setHttpClient(new Client(['verify' => false])) // Deshabilitar la verificación SSL (usar con precaución)
                ->stateless()
                ->user();

            // Busca o crea el usuario en la base de datos
            $user = User::updateOrCreate(
                [
                    'email' => $googleUser->email,
                ],
                [
                    'name' => $googleUser->name,
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar,
                    'email_verified_at' => now(),
                ]
            );

            // Asigna el rol predeterminado "Usuario" si no lo tiene
            $role = Role::firstOrCreate(['name' => 'Usuario']);
            if (!$user->hasRole($role->name)) {
                $user->assignRole($role);
            }

            // Inicia sesión al usuario
            Auth::login($user);

            // Redirige a la página principal después de iniciar sesión
            return redirect('/home');
        } catch (\Exception $e) {
            // Maneja cualquier excepción y redirige al login con un mensaje de error
            return redirect()->route('login')->with('error', 'Hubo un problema al iniciar sesión con Google. Por favor, inténtalo de nuevo.');
        }
    }
}
