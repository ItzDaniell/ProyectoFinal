<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $needsPassword = is_null($user->password);

        return view('PostInicioSesion.Home', compact('needsPassword'));
    }
}
