@extends('layouts.postiniciolayout')

@section('title', 'Detalles de La Conferencia')

@section('content')
    <div class="flex flex-wrap-reverse md:flex-nowrap bg-white shadow-lg rounded-lg p-6 space-y-6 md:space-y-0 md:space-x-6">
        <!-- Detalles de la Conferencia (70%) -->
        <div class="w-full md:w-7/10">
            <h2 class="text-2xl font-bold text-gray-800">Desarrollo de aplicaciones web con React</h2>
            <p class="text-gray-600"><strong>Categoría:</strong> Desarrollo de Aplicaciones Web</p>
            <p class="text-gray-600"><strong>Fecha de Publicación:</strong> 2024-12-09 19:52:55</p>
            <p class="mt-4 text-gray-700">
                Esta es una conferencia para las personas que desean aprender a usar el framework React para el desarrollo
                de aplicaciones web.
            </p>
            <div class="mt-6 flex space-x-4">
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                    Ver Detalles
                </button>
                <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">
                    Volver
                </button>
            </div>
        </div>
        <!-- Detalles del Ponente (30%) -->
        <div class="w-full md:w-3/10 flex flex-col items-center justify-center space-x-4">
            <img src="profile.jpg" alt="Foto del ponente" class="w-32 h-32 rounded-full shadow-lg object-cover" />
            <div class="text-left">
                <p class="text-lg font-semibold text-gray-800">{{ $conferencia->ponente->nombres }}</p>
                <p class="text-gray-600"><strong>Biografía:</strong> {{ $conferencia->ponente->biografia }}</p>
            </div>
        </div>
    </div>
@endsection

