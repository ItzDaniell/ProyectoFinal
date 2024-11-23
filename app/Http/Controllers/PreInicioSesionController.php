<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class PreInicioSesionController extends Controller
{
    public function Bienvenida(){
        return view('PreInicioSesion.Bienvenida');
    }
    public function Contactanos()
    {
        return view('PreInicioSesion.Contactanos');
    }
    
    public function ProcesarContacto(Request $request)
    {
        // Validar los datos recibidos del formulario
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:15',
            'message' => 'required|string|max:500',
        ]);
    
        // Combinar nombres y apellidos para enviar en el mensaje
        $fullName = "{$request->first_name} {$request->last_name}";
    
        // Enviar el correo
        Mail::raw("Mensaje de: {$fullName} ({$request->email})\n\nTeléfono: {$request->phone}\n\nMensaje: {$request->message}", function ($message) use ($request, $fullName) {
            $message->from('alessandro.davila@tecsup.edu.pe', 'DEVSHARE') // Correo y nombre que se muestran como remitente
                    ->to('devsharetecsup@gmail.com') // Cambia esto por un correo válido donde recibir los mensajes
                    ->subject('Nuevo mensaje de contacto');
        });
    
        // Retornar con mensaje de éxito
        return back()->with('success', 'Gracias por contactarnos. Tu mensaje ha sido enviado.');
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
