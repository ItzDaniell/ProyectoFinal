@extends('adminlte::page')

@section('title', 'DevShare - Noticias')

@section('content_header')
    <h2 class="text-3xl font-bold mb-4">Lista de Noticias</h2>
    <a href="{{ route('noticias.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mb-1 inline-block">Agregar Noticia</a>
@stop

@section('content')
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 border text-center">Categoría</th>
                    <th class="px-4 py-2 border text-center">Título</th>
                    <th class="px-4 py-2 border text-center">Autor</th>
                    <th class="px-4 py-2 border text-center">Descripción</th>
                    <th class="px-4 py-2 border text-center">Imagen</th>
                    <th class="px-4 py-2 border text-center">URL</th>
                    <th class="px-4 py-2 border text-center">Estado</th>
                    <th class="px-4 py-2 border text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($noticias as $noticia)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border text-center">{{ $noticia->categoria->descripcion }}</td>
                    <td class="px-4 py-2 border text-center">{{ $noticia->titulo }}</td>
                    <td class="px-4 py-2 border text-center">{{ $noticia->autor }}</td>
                    <td class="px-4 py-2 border text-center">{{ Str::limit($noticia->descripcion, 50) }}</td>
                    <td class="px-4 py-2 border text-center">
                        <a href="{{ asset('storage/' . $noticia->imagen) }}" target="_blank" class="text-blue-500 hover:underline text-center">Ver Imagen</a>
                    </td>
                    <td class="px-4 py-2 border">
                        <a href="{{ $noticia->URL }}" class="text-blue-500 hover:underline text-center" target="_blank">Ver Enlace</a>
                    </td>
                    <td class="px-4 py-2 border text-center">{{ $noticia->estado }}</td>
                    <td class="px-4 py-2 border">
                        <div class="flex justify-between gap-2">
                            <a href="{{ route('noticias.edit', $noticia->id_noticia) }}"
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
        {{ $noticias->links() }}
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
