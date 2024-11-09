<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreRegistrationController extends Controller
{
    public function index(){
        return view('PreRegistro.index');
    }
    public function Contactanos(){
        return view('PreRegistro.Contactanos');
    }
    public function FAQ(){
        return view('PreRegistro.FAQ');
    }
    public function SobreNosotros(){
        return view('PreRegistro.SobreNosotros');
    }
    public function IniciarSesion(){
        return view('PreRegistro.IniciarSesion');
    }
    public function Registrarse(){
        return view('PreRegistro.CrearCuenta');
    }
    public function OlvidasteContrasena(){
        return view('PreRegistro.OlvidasteContrasena');
    }
}
