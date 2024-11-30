@extends('adminlte::page')

@section('title', 'DevShare - Detalle del Ponente')

@section('content_header')
    <h2 class="text-3xl font-bold">Detalle del Ponente</h2>
@stop

@section('content')
    <div class="space-y-4">
        <div>
            <label for="nombres" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" name="nombres" required value="{{ $ponente->nombres }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
        </div>

        <div>
            <label for="correo" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
            <input type="email" name="correo" required value="{{ $ponente->correo }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
        </div>

        <div>
            <label for="biografia" class="block text-sm font-medium text-gray-700">Biografía</label>
            <textarea name="biografia" rows="4" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>{{ $ponente->biografia }}</textarea>
        </div>

        <div>
            <label for="foto" class="block text-sm font-medium text-gray-700">Foto del Ponente</label>
            <div class="mt-4">
                <img src="{{ asset('storage/' . $ponente->foto) }}" alt="Foto del Ponente" class="w-32 h-32 object-cover border border-gray-300 rounded-full">
            </div>
        </div>

        <div class="flex space-x-4">
            <a href="{{ route('ponentes.edit', $ponente->id_ponente) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Editar</a>
            <a href="{{ route('ponentes.index') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Regresar</a>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
