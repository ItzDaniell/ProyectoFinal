@extends('adminlte::page')

@section('title', 'DevShare - Informes de Problemas')

@section('content_header')
<h2 class="text-3xl font-bold mb-4">Informes de Problemas</h2>
<div class="flex justify-between mb-3">
    <a href="{{ route('informes-procesados.index') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Ver informes procesados</a>
</div>
@stop

@section('content')
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 border text-center">Nombre del Usuario</th>
                    <th class="px-4 py-2 border text-center">Tipo</th>
                    <th class="px-4 py-2 border text-center">Imagen</th>
                    <th class="px-4 py-2 border text-center">Descripción</th>
                    <th class="px-4 py-2 border text-center">Estado</th>
                    <th class="px-4 py-2 border text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($informes as $informe)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border text-center">{{ $informe->users->name ?? 'Usuario eliminado' }}</td>
                    <td class="px-4 py-2 border text-center">{{ $informe->tipo }}</td>
                    <td class="px-4 py-2 border text-center">
                        @if ($informe->imagen)
                            <a href="{{ asset('storage/' . $informe->imagen) }}" target="_blank" class="text-blue-500 hover:underline">Ver Imagen</a>
                        @else
                            <span class="text-gray-500">Sin Imagen</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 border text-center">{{ Str::limit($informe->descripcion, 30) }}</td>
                    <td class="px-4 py-2 border text-center">{{ $informe->estado }}</td>
                    <td class="px-4 py-2 border">
                        <div class="flex justify-center gap-4">
                            <a href="{{ route('informes-procesados.create', $informe->id_informar_problema)}}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 text-sm text-center">Procesar</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $informes->links() }}
    </div>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop