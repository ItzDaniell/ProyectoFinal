@extends('adminlte::page')

@section('title', 'DevShare - Inscripciones')

@section('content_header')
<div class="flex-1 p-1">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-3xl font-bold">Inscripciones</h1>
    </div>
@stop

@section('content')
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 border text-center">Nombre de Usuario</th>
                    <th class="px-4 py-2 border text-center">Conferencia</th>
                    <th class="px-4 py-2 border text-center">Fecha de Inscripcion</th>
                    <th class="px-4 py-2 border text-center">Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inscripciones as $inscripcion)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border text-center">{{ $inscripcion->users->name }}</td>
                    <td class="px-4 py-2 border text-center">{{ $inscripcion->conferencia->titulo }}</td>
                    <td class="px-4 py-2 border text-center">{{ $inscripcion->created_at }}</td>
                    <td class="px-4 py-2 border text-center">{{ $inscripcion->estado }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $inscripciones->links() }}
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@stop

