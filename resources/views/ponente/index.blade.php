@extends('adminlte::page')

@section('title', 'DevShare - Ponentes')

@section('content_header')
<h2 class="text-3xl font-bold mb-4">Ponentes</h2>
<div class="flex justify-between mb-3">
    <a href="{{ route('ponentes.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Agregar Ponente</a>
    <a href="{{ route('conferencias.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Ver Conferencias</a>
</div>
@stop

@section('content')
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 border text-center">Nombre</th>
                    <th class="px-4 py-2 border text-center">Correo Electrónico</th>
                    <th class="px-4 py-2 border text-center">Biografía</th>
                    <th class="px-4 py-2 border text-center">Foto</th>
                    <th class="px-4 py-2 border text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ponentes as $ponente)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border text-center">{{ $ponente->nombres }}</td>
                    <td class="px-4 py-2 border text-center">{{ $ponente->correo }}</td>
                    <td class="px-4 py-2 border text-center">{{ Str::limit($ponente->biografia, 30) }}</td>
                    <td class="px-4 py-2 border text-center">
                        <a href="{{ asset('storage/' . $ponente->foto) }}" target="_blank" class="text-blue-500 hover:underline">Ver Foto</a>
                    </td>
                    <td class="px-4 py-2 border">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('ponentes.edit', $ponente->id_ponente) }}"
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
    <div class="mt-4">
        {{ $ponentes->links() }}
    </div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
