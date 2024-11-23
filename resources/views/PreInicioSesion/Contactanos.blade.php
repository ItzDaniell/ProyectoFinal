@extends('layouts.layout')

@section('title', 'Contáctanos')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-50 p-8">
    <!-- Encabezado -->
    <div class="text-center mb-12">
        <h1 class="text-3xl font-bold text-gray-800">Contáctanos</h1>
        <p class="text-gray-600 mt-2">¿Necesitas asistencia técnica o deseas compartir tus comentarios? Estamos aquí para ayudarte.</p>
    </div>

    <!-- Contenedor principal -->
    <div class="max-w-5xl w-full grid grid-cols-1 lg:grid-cols-2 gap-8 bg-white p-8 rounded-lg shadow-xl">
        <!-- Texto informativo a la izquierda -->
        <div class="flex flex-col justify-center space-y-6">
            <p class="text-gray-600 text-lg leading-relaxed">
                Al enviar tu mensaje nos ayudas a seguir mejorando la experiencia de uso de los usuarios.
            </p>
        </div>

        <!-- Formulario de contacto -->
        <div class="bg-gradient-to-b from-orange-400 to-orange-500 p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-white mb-6">Envíanos un mensaje completando el formulario</h2>
            <form action="#" method="POST" class="space-y-4">
                @csrf
                <!-- Campo de Nombres Completos -->
                <div class="relative">
                    <input type="text" name="first_name" placeholder="Nombres Completos" 
                           class="w-full p-3 rounded-lg border focus:outline-none focus:ring-2 focus:ring-orange-200 text-gray-800 placeholder-gray-400">
                </div>

                <!-- Campo de Apellidos Completos -->
                <div class="relative">
                    <input type="text" name="last_name" placeholder="Apellidos Completos" 
                           class="w-full p-3 rounded-lg border focus:outline-none focus:ring-2 focus:ring-orange-200 text-gray-800 placeholder-gray-400">
                </div>

                <!-- Campo de Correo Electrónico -->
                <div class="relative">
                    <input type="email" name="email" placeholder="Correo Electrónico" 
                           class="w-full p-3 rounded-lg border focus:outline-none focus:ring-2 focus:ring-orange-200 text-gray-800 placeholder-gray-400">
                </div>

                <!-- Campo de Número de Celular -->
                <div class="relative">
                    <input type="tel" name="phone" placeholder="Número de Celular" 
                           class="w-full p-3 rounded-lg border focus:outline-none focus:ring-2 focus:ring-orange-200 text-gray-800 placeholder-gray-400">
                </div>

                <!-- Campo de Mensaje -->
                <div class="relative">
                    <textarea name="message" placeholder="Mensaje" rows="5" 
                              class="w-full p-3 rounded-lg border focus:outline-none focus:ring-2 focus:ring-orange-200 text-gray-800 placeholder-gray-400"></textarea>
                </div>

                <!-- Botón de Enviar -->
                <div class="text-center">
                    <button type="submit" 
                            class="bg-white text-orange-500 font-semibold py-2 px-6 rounded-lg hover:bg-orange-100 focus:ring-2 focus:ring-orange-400">
                        Enviar Mensaje
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
