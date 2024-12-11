@extends('adminlte::page')

@section('title', 'DevShare - Comentarios')

@section('content_header')
<div class="flex-1 p-1">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-3xl font-bold">Comentarios</h1>
        <div class="flex space-x-4 relative items-center">
            <div class="relative">
                <ion-icon name="search-outline" class="text-2xl cursor-pointer" id="searchIcon"></ion-icon>
                <div id="searchDropdown" class="hidden absolute right-0 w-96 mt-2 bg-white shadow-lg rounded-lg p-4">
                    <p class="text-sm pb-2">Buscar Comentario por contenido</p>
                    <form action="{{ route('noticias.index') }}" method="get" class="flex">
                        <input name="busqueda" type="text" placeholder="Buscar por Título..." class="w-full p-2 border rounded-md text-sm mr-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-between mb-3">
        <a href="{{ route('publicacion.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Ver todas las publicaciones</a>
    </div>
@stop

@section('content')
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 border text-center">Nombre de la Publicación</th>
                    <th class="px-4 py-2 border text-center">Nombre del Usuario</th>
                    <th class="px-4 py-2 border text-center">Contenido</th>
                    <th class="px-4 py-2 border text-center">Estado</th>
                    <th class="px-4 py-2 border text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comentarios as $comentario)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border text-center">{{ $comentario->publicacion->titulo }}</td>
                    <td class="px-4 py-2 border text-center">{{ $comentario->users->name }}</td>
                    <td class="px-4 py-2 border text-center">{{ Str::limit($comentario->contenido, 50) }}</td>
                    <td class="px-4 py-2 border text-center">{{ $comentario->estado }}</td>
                    <td class="px-4 py-2 border">
                        <div class="flex justify-between gap-2">
                            <a href="{{ route('comentarios.edit', $comentario->id_comentario) }}"
                            class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 text-sm text-center">
                                Editar
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $comentarios->links() }}
    </div>
    @vite('resources/js/mostrar_modal_busq_cat.js')
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@stop
