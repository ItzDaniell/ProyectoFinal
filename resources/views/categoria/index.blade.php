@extends('layouts.postiniciolayout')

@section('title', 'Lista de Categorias')

@section('content')
<h2 class="text-2xl font-bold mb-4">Lista de Categorias</h2>
<div class="flex justify-between mb-4">
    <a href="{{ route('categorias.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Agregar Categoría</a>
</div>
<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-4 py-2 border">ID_Categoria</th>
                <th class="px-4 py-2 border">Descripcion</th>
                <th class="px-4 py-2 border">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
            <tr class="hover:bg-gray-100">
                <td class="px-4 py-2 border">{{ $categoria->id_categoria }}</td>
                <td class="px-4 py-2 border">{{ $categoria->descripcion }}</td>
                <td class="px-4 py-2 border">
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
@endsection