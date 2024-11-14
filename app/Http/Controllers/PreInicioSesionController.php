<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreInicioSesionController extends Controller
{
    public function Bienvenida(){
        return view('PreInicioSesion.Bienvenida');
    }
    public function Contactanos(){
        return view('PreInicioSesion.Contactanos');
    }
    public function FAQ(){
        return view('PreInicioSesion.FAQ');
    }
    public function SobreNosotros(){
        return view('PreInicioSesion.SobreNosotros');
    }
    public function IniciarSesion(){
        return view('PreInicioSesion.IniciarSesion');
    }
    public function Registrarse(){
        return view('PreInicioSesion.Registrarse');
    }
    public function OlvidasteContrasena(){
        return view('PreInicioSesion.OlvidasteContrasena');
    }
}
