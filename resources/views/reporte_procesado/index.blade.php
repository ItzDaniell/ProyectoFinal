@extends('adminlte::page')

@section('title', 'DevShare - Reportes Procesado')

@section('content_header')
<h2 class="text-3xl font-bold mb-4">Reportes Procesados</h2>
<div class="flex justify-between mb-3">
    <a href="{{ route('reportes.index') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Ver reportes sin procesar</a>
</div>
@stop

@section('content')
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 border text-center">Nombre del Moderador</th>
                    <th class="px-4 py-2 border text-center">Nombre del Usuario</th>
                    <th class="px-4 py-2 border text-center">Usuario Reportado</th>
                    <th class="px-4 py-2 border text-center">Tipo</th>
                    <th class="px-4 py-2 border text-center">Imagen</th>
                    <th class="px-4 py-2 border text-center">Descripción</th>
                    <th class="px-4 py-2 border text-center">Comentario</th>
                    <th class="px-4 py-2 border text-center">Acción</th>
                    <th class="px-4 py-2 border text-center">Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reportes as $reporte)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border text-center">{{ $reporte->moderador->name }}</td>
                    <td class="px-4 py-2 border text-center">{{ $reporte->reporte->users->name ?? 'Usuario eliminado' }}</td>
                    <td class="px-4 py-2 border text-center">{{ $reporte->reporte->reportado->name ?? 'Usuario eliminado' }}</td>
                    <td class="px-4 py-2 border text-center">{{ $reporte->reporte->tipo }}</td>
                    <td class="px-4 py-2 border text-center">
                        @if ($reporte->reporte->imagen)
                            <a href="{{ asset('storage/' . $reporte->reporte->imagen) }}" target="_blank" class="text-blue-500 hover:underline">Ver Imagen</a>
                        @else
                            <span class="text-gray-500">Sin Imagen</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 border text-center">{{ Str::limit($reporte->reporte->descripcion, 30) }}</td>
                    <td class="px-4 py-2 border text-center">{{ Str::limit($reporte->comentario, 30) }}</td>
                    <td class="px-4 py-2 border text-center">{{ $reporte->accion }}</td>
                    <td class="px-4 py-2 border text-center">{{ $reporte->estado }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $reportes->links() }}
    </div>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
