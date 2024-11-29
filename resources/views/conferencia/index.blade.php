@extends('adminlte::page')

@section('title', 'DevShare - Usuarios Baneados')

@section('content_header')
    <h2 class="text-3xl font-bold mb-4">Conferencias Virtuales</h2>
    <div class="flex justify-between mb-1">
        <a href="" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Agregar Conferencia</a>
        <a href="{{ route('ponentes.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Ver Ponentes</a>
    </div>
@stop

@section('content')
<div class="flex-1 bg-gray-100 overflow-y-auto h-screen">
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 border">Ponente</th>
                    <th class="px-4 py-2 border">Título</th>
                    <th class="px-4 py-2 border">Descripción</th>
                    <th class="px-4 py-2 border">Categoría</th>
                    <th class="px-4 py-2 border">Tiempo</th>
                    <th class="px-4 py-2 border">Fecha Inicio</th>
                    <th class="px-4 py-2 border">Imagen</th>
                    <th class="px-4 py-2 border">URL</th>
                    <th class="px-4 py-2 border">Estado</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($conferencias as $conferencia)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border">{{ $conferencia->pontente->nombres }}</td>
                    <td class="px-4 py-2 border">{{ $conferencia->titulo }}</td>
                    <td class="px-4 py-2 border">{{ Str::limit($conferencia->descripcion, 50) }}</td>
                    <td class="px-4 py-2 border">{{ $conferencia->categoria->descripcion }}</td>
                    <td class="px-4 py-2 border">{{ $conferencia->tiempo }}</td>
                    <td class="px-4 py-2 border">{{ $conferencia->fecha_inicio }}</td>
                    <td class="px-4 py-2 border">
                        <img src="{{ asset($conferencia->imagen) }}" alt="Imagen" class="w-12 h-auto">
                    </td>
                    <td class="px-4 py-2 border">
                        <a href="{{ $conferencia->URL }}" class="text-blue-500 hover:underline" target="_blank">Ver enlace</a>
                    </td>
                    <td class="px-4 py-2 border">{{ $conferencia->estado }}</td>
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