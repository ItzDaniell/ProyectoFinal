@extends('layouts.postiniciolayout')

@section('title', 'Detalles De La Noticia')

@section('content')
<div class="flex-1 p-4">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-3xl font-bold">{{ $noticia->titulo }}</h1>
    </div>
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg overflow-hidden mt-8 flex flex-wrap-reverse md:flex-nowrap">
        <!-- Contenido de la noticia -->
        <div class="flex-1 p-6">
            <!-- Información de la noticia -->
            <div class="text-sm text-gray-600 space-y-2">
                <p><span class="font-semibold">Autor:</span> {{ $noticia->autor }}</p>
                <p><span class="font-semibold">Categoría:</span> {{ $noticia->categoria->descripcion }}</p>
                <p><span class="font-semibold">Fecha de Publicación:</span> {{ $noticia->created_at }}</p>
            </div>

            <!-- Descripción de la noticia -->
            <div class="mt-2 mb-4">
                <p class="text-gray-700 leading-relaxed">{{ $noticia->descripcion }}</p>
            </div>
            <a href="{{ $noticia->URL }}" class="mt-8 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Ver Detalles</a>
            <a href="{{ route('Noticias') }}" class="mt-8 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Volver</a>
        </div>

        <!-- Imagen de la noticia -->
        <div class="w-full md:w-1/3 bg-gray-200">
            <img src="{{ asset('storage/' . $noticia->imagen) }}" 
                alt="{{ $noticia->titulo }}" 
                class="w-full h-96 object-cover">
        </div>
    </div>
</div>
@endsection