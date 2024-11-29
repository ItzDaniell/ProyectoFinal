@extends('adminlte::page')

@section('title', 'DevShare - Categorias')

@section('content_header')
    <h2 class="text-3xl font-bold mb-4">Lista de Categorias</h2>
    <a href="{{ route('categorias.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mb-1 inline-block">Agregar Categoría</a>
@stop

@section('content')
<div class="flex-1 bg-gray-100 overflow-y-auto h-screen">
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 border text-center">Descripción</th>
                    <th class="px-4 py-2 border text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border text-center">{{ $categoria->descripcion }}</td>
                    <td class="px-4 py-2 border text-center">
                        <div class="flex justify-between gap-2">
                            <a href="{{ route('categorias.edit', $categoria->id_categoria) }}" 
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
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop