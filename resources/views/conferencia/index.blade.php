@extends('layouts.postiniciolayout')

@section('title', 'Lista de Conferencias')

@section('content')
<h2 class="text-2xl font-bold mb-4">Lista de Conferencias</h2>
<div class="flex justify-between mb-4">
    <a href="{{ route('ponentes.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Lista de Ponentes</a>
    <a href="" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Agregar Conferencia</a>
</div>

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
<div class="mt-4">
    {{ $conferencias->links() }}
</div>
@endsection