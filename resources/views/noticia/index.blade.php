@extends('layouts.postiniciolayout')

@section('content')
<h2 class="text-2xl font-bold mb-4">Lista de Noticias</h2>
<a href="{{ route('noticias.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mb-4 inline-block">Agregar Noticia</a>

<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-4 py-2 border">Categoría</th>
                <th class="px-4 py-2 border">Título</th>
                <th class="px-4 py-2 border">Autor</th>
                <th class="px-4 py-2 border">Descripción</th>
                <th class="px-4 py-2 border">Imagen</th>
                <th class="px-4 py-2 border">URL</th>
                <th class="px-4 py-2 border">Estado</th>
                <th class="px-4 py-2 border">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($noticias as $noticia)
            <tr class="hover:bg-gray-100">
                <td class="px-4 py-2 border">{{ $noticia->categoria->descripcion }}</td>
                <td class="px-4 py-2 border">{{ $noticia->titulo }}</td>
                <td class="px-4 py-2 border">{{ $noticia->autor }}</td>
                <td class="px-4 py-2 border">{{ Str::limit($noticia->descripcion, 50) }}</td>
                <td class="px-4 py-2 border">
                    <a href="{{ asset('storage/' . $noticia->imagen) }}" target="_blank" class="text-blue-500 hover:underline">Ver Imagen</a>
                </td>
                <td class="px-4 py-2 border">
                    <a href="{{ $noticia->URL }}" class="text-blue-500 hover:underline" target="_blank">Ver enlace</a>
                </td>
                <td class="px-4 py-2 border">{{ $noticia->estado }}</td>
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
@endsection
