<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnviarSolicitudController extends Controller
{
    public function enviarSolicitud(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:15',
            'nombre_empresa' => 'required|string|max:255',
            'ruc' => 'required|string|max:11',
            'direccion' => 'required|string|max:255',
            'motivo' => 'required|string|max:500',
        ]);

        // Construir el mensaje del correo
        $messageContent = "
            Nombre: {$validatedData['nombre']} {$validatedData['apellido']}
            Correo Electrónico: {$validatedData['correo']}
            Teléfono: {$validatedData['telefono']}
            Nombre de la Empresa: {$validatedData['nombre_empresa']}
            RUC: {$validatedData['ruc']}
            Dirección: {$validatedData['direccion']}
            
            Motivo:
            {$validatedData['motivo']}
        ";

        // Enviar el correo
        Mail::raw($messageContent, function ($message) {
            $message->from('alessandro.davila@tecsup.edu.pe', 'DevShare') // Cambia el remitente si es necesario
                ->to('devsharetecsup@gmail.com') // Correo destinatario
                ->subject('Nueva Solicitud de Rol Empresa');
        });

        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success', 'Tu solicitud ha sido enviada con éxito.');
    }
}
