@extends('adminlte::page')

@section('title', 'DevShare - Conferencias')

@section('content_header')
    <h2 class="text-3xl font-bold mb-4">Conferencias Virtuales</h2>
    <div class="flex justify-between mb-3">
        <a href="{{ route('conferencias.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Agregar Conferencia</a>
        <a href="{{ route('ponentes.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Ver Ponentes</a>
    </div>
@stop

@section('content')
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 border text-center">Título</th>
                    <th class="px-4 py-2 border text-center">Ponente</th>
                    <th class="px-4 py-2 border text-center">Descripción</th>
                    <th class="px-4 py-2 border text-center">Categoría</th>
                    <th class="px-4 py-2 border text-center">Duración (Min)</th>
                    <th class="px-4 py-2 border text-center">Fecha/Hora</th>
                    <th class="px-4 py-2 border text-center">Imagen</th>
                    <th class="px-4 py-2 border text-center">URL</th>
                    <th class="px-4 py-2 border text-center">Estado</th>
                    <th class="px-4 py-2 border text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($conferencias as $conferencia)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border text-center">{{ $conferencia->titulo }}</td>
                    <td class="px-4 py-2 border text-center">{{ $conferencia->ponente->nombres }}</td>
                    <td class="px-4 py-2 border text-center">{{ Str::limit($conferencia->descripcion, 50) }}</td>
                    <td class="px-4 py-2 border text-center">{{ $conferencia->categoria->descripcion }}</td>
                    <td class="px-4 py-2 border text-center">{{ $conferencia->duracion }}</td>
                    <td class="px-4 py-2 border text-center">{{ $conferencia->fecha_hora_inicio }}</td>
                    <td class="px-4 py-2 border text-center">
                        <a href="{{ asset('storage/' . $conferencia->imagen) }}" target="_blank" class="text-blue-500 hover:underline text-center">Ver Imagen</a>
                    </td>
                    <td class="px-4 py-2 border text-center">
                        <a href="{{ $conferencia->URL }}" class="text-blue-500 hover:underline" target="_blank">Ver enlace</a>
                    </td>
                    <td class="px-4 py-2 border text-center">{{ $conferencia->estado }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        {{ $conferencias->links() }}
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
