@extends('adminlte::page')

@section('title', 'DevShare - Procesar Reporte')

@section('content_header')
    <h2 class="text-3xl font-bold">Procesar Reporte</h2>
@stop

@section('content')
    <div class="overflow-x-auto">
        <form action="{{ route('reportes-procesados.store', $reporte->id_reporte) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
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
                <label for="Nombre del usuario" class="block text-sm font-medium text-gray-700">Nombre del usuario</label>
                <input type="text" value="{{ $reporte->users->name }}" readonly class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" >
            </div>

            <div>
                <label for="Nombre del usuario reportado" class="block text-sm font-medium text-gray-700">Nombre del usuario reportado</label>
                <input type="text" value="{{ $reporte->reportado->name }}" readonly class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
            </div>

            <div>
                <label for="Razón del reporte" class="block text-sm font-medium text-gray-700">Razón del reporte</label>
                <input type="text" value="{{ $reporte->tipo }}" readonly class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
            </div>

            <div>
                <label for="Prueba" class="block text-sm font-medium text-gray-700">Prueba del usuario</label>
                <div class="mt-4">
                    <img id="preview" src="{{ asset('storage/' . $reporte->imagen) }}" alt="Prueba del usuario" class="w-64 h-64 object-cover border border-gray-300">
                </div>
            </div>

            <div>
                <label for="Descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea rows="4" readonly class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">{{ $reporte->descripcion }}</textarea>
            </div>

            <div>
                <label for="Comentario" class="block text-sm font-medium text-gray-700">Comentario del Moderador</label>
                <textarea name="comentario" rows="4" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1"></textarea>
            </div>

            <div>
                <label for="Acción a Realizar" class="block text-sm font-medium text-gray-700">Acción a Realizar</label>
                <select name="accion" required class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
                    <option value="">[ SELECCIONE UNA ACCIÓN ]</option>
                    <option value="Suspender temporalmente al usuario">Suspender temporalmente al usuario</option>
                    <option value="Suspender permanentemente al usuario">Suspender permanentemente al usuario</option>
                    <option value="Ninguna acción a realizar">Ninguna acción a realizar</option>
                </select>
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
                <button id="clear-button" type="reset" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Limpiar</button>
                <a href="{{ route('reportes.index') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Regresar</a>
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
