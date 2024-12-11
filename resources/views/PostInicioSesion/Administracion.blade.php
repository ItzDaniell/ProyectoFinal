@extends('adminlte::page')

@section('title', 'DevShare - Administración')

@section('content_header')
    <h1 class="text-3xl font-semibold">¡Hola {{ auth()->user()->name }}!</h1>
@stop

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 pb-4">
        <!-- Tarjeta de Usuarios -->
        @if (Auth::user()->rol == 'Administrador' || Auth::user()->rol == 'Moderador')
            <div class="bg-white rounded-lg shadow p-6">
                <img src="https://fececo.org.ar/wp-content/uploads/2022/06/personas-usuarios.png" alt="Usuarios"
                    class="w-full h-32 object-cover rounded-t-lg mb-4">
                <h2 class="text-xl font-semibold">Usuarios</h2>
                <p class="mt-2">Total: {{ $usuariosCount }}</p>
            </div>
            <!-- Tarjeta de Publicaciones -->
            <div class="bg-white rounded-lg shadow p-6">
                <img src="https://www.posicionamiento-web.site/wp-content/uploads/2018/03/publicacion-en-rrss-exitosa.png"
                    alt="Publicaciones" class="w-full h-32 object-cover rounded-t-lg mb-4">
                <h2 class="text-xl font-semibold">Publicaciones</h2>
                <p class="mt-2">Total: {{ $publicacionesCount }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <img src="" alt="Comentarios" class="w-full h-32 object-cover rounded-t-lg mb-4">
                <h2 class="text-xl font-semibold">Comentarios</h2>
                <p class="mt-2">Total: {{ $comentariosCount }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <img src="" alt="Reportes" class="w-full h-32 object-cover rounded-t-lg mb-4">
                <h2 class="text-xl font-semibold">Reportes</h2>
                <p class="mt-2">Total: {{ $reportesCount }}</p>
            </div>
        @endif
        @if (auth()->user()->rol == 'Administrador' || auth()->user()->rol == 'Servicio Tecnico')
            <div class="bg-white rounded-lg shadow p-6">
                <img src="" alt="Noticias" class="w-full h-32 object-cover rounded-t-lg mb-4">
                <h2 class="text-xl font-semibold">Noticias</h2>
                <p class="mt-2">Total: {{ $noticiasCount }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <img src="" alt="Informes de Problema" class="w-full h-32 object-cover rounded-t-lg mb-4">
                <h2 class="text-xl font-semibold">Informes de Problema</h2>
                <p class="mt-2">Total: {{ $informesProblemasCount }}</p>
            </div>
        @endif
        @if (auth()->user()->rol == 'Administrador' || auth()->user()->rol == 'Gestor de Conferencias')
            <!-- Tarjeta de Conferencias -->
            <div class="bg-white rounded-lg shadow p-6">
                <img src="" alt="Conferencias" class="w-full h-32 object-cover rounded-t-lg mb-4">
                <h2 class="text-xl font-semibold">Conferencias</h2>
                <p class="mt-2">Total: {{ $conferenciasCount }}</p>
            </div>

            <!-- Tarjeta de Ponentes -->
            <div class="bg-white rounded-lg shadow p-6">
                <img src="" alt="Ponentes" class="w-full h-32 object-cover rounded-t-lg mb-4">
                <h2 class="text-xl font-semibold">Ponentes</h2>
                <p class="mt-2">Total: {{ $ponentesCount }}</p>
            </div>

            <!-- Tarjeta de Inscripciones -->
            <div class="bg-white rounded-lg shadow p-6">
                <img src="" alt="Inscripciones" class="w-full h-32 object-cover rounded-t-lg mb-4">
                <h2 class="text-xl font-semibold">Inscripciones</h2>
                <p class="mt-2">Total: {{ $inscripcionesCount }}</p>
            </div>
        @endif
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
