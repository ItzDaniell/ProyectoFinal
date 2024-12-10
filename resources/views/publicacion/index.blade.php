@extends('adminlte::page')

@section('title', 'DevShare - Publicaciones')

@section('content_header')
<div class="flex-1 p-1">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-3xl font-bold">Publicaciones</h1>
        <div class="flex space-x-4 relative items-center">
            <div class="relative">
                <ion-icon name="search-outline" class="text-2xl cursor-pointer" id="searchIcon"></ion-icon>
                <div id="searchDropdown" class="hidden absolute right-0 w-96 mt-2 bg-white shadow-lg rounded-lg p-4">
                    <p class="text-sm pb-2">Buscar Publicación por título</p>
                    <form action="{{ route('publicacion.index') }}" method="get" class="flex">
                        <input name="busqueda" type="text" placeholder="Buscar por Título..." class="w-full p-2 border rounded-md text-sm mr-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
                    </form>
                </div>
            </div>
            <div class="relative">
                <ion-icon name="funnel-outline" class="text-2xl cursor-pointer" id="filterIcon"></ion-icon>
                <div id="filterDropdown" class="hidden absolute right-0 w-80 mt-2 bg-white shadow-lg rounded-lg p-4">
                    <div class="flex flex-col space-y-2">
                        <p class="text-sm">Filtrar por Categoría</p>
                        <form action="{{ route('publicacion.index') }}" method="get" class="flex flex-col space-y-3">
                            <select name="categoria" class="p-2 border rounded-md text-sm">
                                <option value="0">[ SELECCIONE ]</option>
                                <option value="0">Mostrar Todo</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->descripcion }}">{{ $categoria->descripcion }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 border text-center">Nombre de Usuario</th>
                    <th class="px-4 py-2 border text-center">Categoria</th>
                    <th class="px-4 py-2 border text-center">Título</th>
                    <th class="px-4 py-2 border text-center">Descripción</th>
                    <th class="px-4 py-2 border text-center">Imagen</th>
                    <th class="px-4 py-2 border text-center">Estado</th>
                    <th class="px-4 py-2 border text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($publicaciones as $publicacion)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border text-center">{{ $publicacion->users->name }}</td>
                    <td class="px-4 py-2 border text-center">{{ $publicacion->categoria->descripcion }}</td>
                    <td class="px-4 py-2 border text-center">{{ $publicacion->titulo }}</td>
                    <td class="px-4 py-2 border text-center">{{ Str::limit($publicacion->descripcion, 50)  ?? 'No disponible'}}</td>
                    <td class="px-4 py-2 border text-center">
                        @if ($publicacion->archivo)
                            <a href="{{ asset('storage/' . $publicacion->archivo) }}" target="_blank" class="text-blue-500 hover:underline">Ver Archivo</a>
                        @else
                            Sin Archivo
                        @endif
                    </td>
                    <td class="px-4 py-2 border text-center">{{ $publicacion->estado }}</td>
                    <td class="px-4 py-2 border">
                        <div class="flex justify-between gap-2">
                            <a href="{{ route('publicacion.edit', $publicacion->id_publicacion) }}"
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
        {{ $publicaciones->links() }}
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
