@extends('layouts.postiniciolayout')

@section('title', 'Lista de Ponentes')

@section('content')
<h2 class="text-2xl font-bold mb-4">Lista de Ponentes</h2>
<div class="flex justify-between mb-4">
    <a href="{{ route('conferencias.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Lista de Conferencias</a>
    <a href="{{ route('ponentes.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Agregar Ponente</a>
</div>

<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-4 py-2 border">Nombres</th>
                <th class="px-4 py-2 border">Correo Electrónico</th>
                <th class="px-4 py-2 border">Biografía</th>
                <th class="px-4 py-2 border">Foto</th>
                <th class="px-4 py-2 border">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ponentes as $ponente)
            <tr class="hover:bg-gray-100">
                <td class="px-4 py-2 border">{{ $ponente->nombres }}</td>
                <td class="px-4 py-2 border">{{ $ponente->correo }}</td>
                <td class="px-4 py-2 border">{{ Str::limit($ponente->biografia, 30) }}</td>
                <td class="px-4 py-2 border">
                    <a href="{{ asset('storage/' . $ponente->foto) }}" target="_blank" class="text-blue-500 hover:underline">Ver Foto</a>
                </td>
                <td class="px-4 py-2 border">
                    <div class="flex justify-between gap-2">
                        <a href="{{ route('ponentes.edit', $ponente->id_ponente) }}" 
                           class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 text-sm text-center">
                            Editar
                        </a>
                        <a href="{{ route('ponentes.show', $ponente->id_ponente) }}" 
                           class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 text-sm text-center">
                            Ver
                        </a>
                    </div>
                </td>
            </tr>             
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4">
    {{ $ponentes->links() }}
</div>
@endsection