@extends('adminlte::page')

@section('title', 'DevShare - Conferencias')

@section('content_header')
    <h2 class="text-3xl font-bold mb-4">Conferencias Virtuales</h2>
    <div class="flex justify-between mb-1">
        <a href="" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Agregar Conferencia</a>
        <a href="{{ route('ponentes.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Ver Ponentes</a>
    </div>
@stop

@section('content')
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 border text-center">Ponente</th>
                    <th class="px-4 py-2 border text-center">Título</th>
                    <th class="px-4 py-2 border text-center">Descripción</th>
                    <th class="px-4 py-2 border text-center">Categoría</th>
                    <th class="px-4 py-2 border text-center">Tiempo</th>
                    <th class="px-4 py-2 border text-center">Fecha Inicio</th>
                    <th class="px-4 py-2 border text-center">Imagen</th>
                    <th class="px-4 py-2 border text-center">URL</th>
                    <th class="px-4 py-2 border text-center">Estado</th>
                    <th class="px-4 py-2 border text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($conferencias as $conferencia)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border text-center">{{ $conferencia->pontente->nombres }}</td>
                    <td class="px-4 py-2 border text-center">{{ $conferencia->titulo }}</td>
                    <td class="px-4 py-2 border text-center">{{ Str::limit($conferencia->descripcion, 50) }}</td>
                    <td class="px-4 py-2 border text-center">{{ $conferencia->categoria->descripcion }}</td>
                    <td class="px-4 py-2 border text-center">{{ $conferencia->tiempo }}</td>
                    <td class="px-4 py-2 border text-center">{{ $conferencia->fecha_inicio }}</td>
                    <td class="px-4 py-2 border text-center text-center">
                        <img src="{{ asset($conferencia->imagen) }}" alt="Imagen" class="w-12 h-auto">
                    </td>
                    <td class="px-4 py-2 border text-center">
                        <a href="{{ $conferencia->URL }}" class="text-blue-500 hover:underline" target="_blank">Ver enlace</a>
                    </td>
                    <td class="px-4 py-2 border text-center">{{ $conferencia->estado }}</td>
                    {{--
                    <td class="px-4 py-2 border">
                        <a href="{{ route('conferencias.edit', $conferencia->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600 text-sm">Editar</a>
                        <form action="{{ route('conferencias.destroy', $conferencia->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 text-sm">Eliminar</button>
                        </form>
                    </td>
                    --}}
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
