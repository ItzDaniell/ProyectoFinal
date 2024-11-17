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
                    <img src="{{ asset($noticia->imagen) }}" alt="Imagen de la noticia" class="w-12 h-12 rounded-full">
                </td>
                <td class="px-4 py-2 border">{{ $noticia->URL }}</td>
                <td class="px-4 py-2 border">{{ $noticia->estado }}</td>
                <td class="px-4 py-2 border">
                    <!-- Aquí puedes agregar botones de acción (editar, eliminar) si es necesario -->
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
