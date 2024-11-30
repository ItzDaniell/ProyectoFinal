@extends('adminlte::page')

@section('title', 'DevShare - Usuarios')

@section('content_header')
    <h2 class="text-3xl font-bold mb-4">Editar Estado de Publicación</h2>
@stop

@section('content')
    <div class="overflow-x-auto">
        <form action="{{ route('publicacion.update', $publicacion->id_publicacion) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PATCH')
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div>
                <label for="nombres" class="block text-sm font-medium text-gray-700">Nombre del Usuario</label>
                <input type="text" name="nombres" value="{{ $publicacion->users->name }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
            </div>

            <div>
                <label for="categoria" class="block text-sm font-medium text-gray-700">Categoria de la Publicación</label>
                <input type="text" name="categoria" value="{{ $publicacion->categoria->descripcion }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
            </div>

            <div>
                <label for="titulo" class="block text-sm font-medium text-gray-700">Título de la Publicación</label>
                <input type="text" name="titulo" value="{{ $publicacion->titulo }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
            </div>

            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="descripcion" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>{{ $publicacion->descripcion }}</textarea>
            </div>

            <div>
                <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen de la Publicación</label>
                @if ($publicacion->imagen == 'Sin Imagen')
                    <input type="text" name="imagen" required value="{{ $publicacion->imagen }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
                @else
                    <div class="mt-4">
                        <img src="{{ asset('storage/' . $publicacion->imagen) }}" alt="Imagen de la Publicación" class="w-64 h-64 object-cover border border-gray-300">
                    </div>
                @endif
            </div>

            <div>
                <label for="estado" class="block text-sm font-medium text-gray-700">Estado de la Publicación</label>
                <select name="estado" id="estado" required class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
                    <option value="Activo" {{ $publicacion->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                    <option value="Inactivo" {{ $publicacion->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Guardar</button>
                <a href="{{ route('publicacion.index') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Regresar</a>
            </div>
        </form>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
