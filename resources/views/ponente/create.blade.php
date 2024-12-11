@extends('adminlte::page')

@section('title', 'DevShare - Añadir Ponente')

@section('content_header')
    <h2 class="text-3xl font-bold">Añadir Ponente</h2>
@stop

@section('content')
    <div class="overflow-x-auto mb-4">
        <form action="{{ route('ponentes.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
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
                <label for="nombres" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="nombres" required class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
            </div>

            <div>
                <label for="correo" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email" name="correo" required class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
            </div>

            <div>
                <label for="biografia" class="block text-sm font-medium text-gray-700">Biografía</label>
                <textarea name="biografia" rows="4" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1"></textarea>
            </div>

            <div>
                <label for="foto" class="block text-sm font-medium text-gray-700">Foto</label>
                <input type="file" id="imagen" name="foto" accept="image/*" class="mt-1 block w-full h-12 text-sm text-gray-500 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-4" onchange="previewImage(event)">
                <div class="mt-4">
                    <img id="preview" src="#" alt="Foto del Ponente" class="hidden w-32 h-32 object-cover border border-gray-300 rounded-full">
                </div>
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
                <button type="reset" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600" onclick="clearPreview()">Limpiar</button>
                <a href="{{ route('ponentes.index') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Regresar</a>
            </div>
        </form>
        @vite('resources/js/vista_previa.js')
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
