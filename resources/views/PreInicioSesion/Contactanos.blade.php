@extends('layouts.layout')

@section('title', 'Contáctanos')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-50 pt-16 p-8">
    <!-- Encabezado -->
    <div class="text-center mb-50">
        <h1 class="text-5xl font-extrabold text-black mt-8">Contáctanos</h1>
        <p class="text-lg text-gray-700 mt-14">¿Necesitas asistencia técnica o deseas compartir tus comentarios? Estamos aquí para ayudarte.</p>
    </div>

    <!-- Contenedor principal -->
    <div class="max-w-4xl w-full grid grid-cols-1 lg:grid-cols-2 gap-8 bg-white p-8 rounded-lg shadow-xl">
        <!-- Texto informativo a la izquierda -->
        <div class="flex flex-col justify-center space-y-6 text-gray-600">
            <p class="text-lg leading-relaxed">
                Al enviar tu mensaje, nos ayudas a seguir mejorando la experiencia de uso de los usuarios.
            </p>
        </div>

        <!-- Formulario de contacto -->
        <div class="bg-orange-400 p-8 rounded-lg shadow-lg">
            <!-- Título del formulario -->
            <h2 class="text-2xl font-bold text-black mb-6">Envíanos un mensaje completando el formulario</h2>
            
            <!-- Formulario -->
            <form action="{{ route('Contactanos.post') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Campo de Nombres Completos -->
                <div>
                    <input type="text" name="first_name" placeholder="Nombres Completos" 
                        class="w-full p-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-300 text-gray-800" required>
                </div>

                <!-- Campo de Apellidos Completos -->
                <div>
                    <input type="text" name="last_name" placeholder="Apellidos Completos" 
                        class="w-full p-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-300 text-gray-800" required>
                </div>

                <!-- Campo de Correo Electrónico -->
                <div>
                    <input type="email" name="email" placeholder="Correo Electrónico" 
                        class="w-full p-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-300 text-gray-800" required>
                </div>

                <!-- Campo de Número de Celular -->
                <div>
                    <input type="tel" name="phone" placeholder="Número de Celular" 
                        class="w-full p-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-300 text-gray-800">
                </div>

                <!-- Campo de Mensaje -->
                <div>
                    <textarea name="message" placeholder="Mensaje" rows="5" 
                        class="w-full p-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-300 text-gray-800" required></textarea>
                </div>

                <!-- Botón de Enviar -->
                <div class="text-center">
                    <button type="submit" 
                        class="bg-white text-orange-500 font-semibold py-2 px-6 rounded shadow hover:bg-orange-100 focus:ring-2 focus:ring-orange-400">
                        Enviar Mensaje
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
