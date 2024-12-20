@extends('adminlte::page')

@section('title', 'DevShare - Agregar Noticia')

@section('content_header')
    <h2 class="text-3xl font-bold">Agregar Noticia</h2>
@stop

@section('content')
    <div class="overflow-x-auto mb-4">
        <form action="{{ route('noticias.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
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
                <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" name="titulo" required class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
            </div>

            <div>
                <label for="autor" class="block text-sm font-medium text-gray-700">Autor</label>
                <input type="text" name="autor" required class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
            </div>

            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="descripcion" rows="4" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1"></textarea>
            </div>

            <div>
                <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen</label>
                <input type="file" id="imagen" required name="imagen" accept="image/*" class="mt-1 block w-full h-12 text-sm text-gray-500 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-4" onchange="previewImage(event)">
                <div class="mt-4">
                    <img id="preview" src="#" alt="Imagen de la Noticia" class="hidden w-64 h-64 object-cover border border-gray-300">
                </div>
            </div>

            <div>
                <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                <input type="url" name="URL" required class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
            </div>

            <div>
                <label for="categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
                <select name="id_categoria" required class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
                    <option value="">[ SELECCIONE ]</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id_categoria }}">{{ $categoria->descripcion }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
                <button id="clear-button" type="reset" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Limpiar</button>
                <a href="{{ route('noticias.index') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Regresar</a>
            </div>
        </form>
    </div>
    @vite('resources/js/vista_previa.js')
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
