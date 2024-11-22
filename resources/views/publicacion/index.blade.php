@extends('layouts.postiniciolayout')

@section('content')

@section('title', 'Lista de Publicaciones')
<h2 class="text-2xl font-bold mb-4">Lista de Publicaciones</h2>
<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-4 py-2 border">Nombre de Usuario</th>
                <th class="px-4 py-2 border">Categoria</th>
                <th class="px-4 py-2 border">Título</th>
                <th class="px-4 py-2 border">Descripción</th>
                <th class="px-4 py-2 border">Imagen</th>
                <th class="px-4 py-2 border">Estado</th>
                <th class="px-4 py-2 border">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($publicaciones as $publicacion)
            <tr class="hover:bg-gray-100">
                <td class="px-4 py-2 border">{{ $publicacion->users->name }}</td>
                <td class="px-4 py-2 border">{{ $publicacion->categoria->descripcion }}</td>
                <td class="px-4 py-2 border">{{ $publicacion->titulo }}</td>
                <td class="px-4 py-2 border">{{ Str::limit($publicacion->descripcion, 50)  ?? 'No disponible'}}</td>
                <td class="px-4 py-2 border">
                    @if ($publicacion->imagen)
                        <a href="{{ asset('storage/' . $publicacion->imagen) }}" target="_blank" class="text-blue-500 hover:underline">Ver Imagen</a>
                    @else
                        Sin Imagen
                    @endif
                </td>
                <td class="px-4 py-2 border">{{ $publicacion->estado }}</td>
                <td class="px-4 py-2 border">
                    <div class="flex justify-between gap-2">
                        <a href="{{ route('publicacion.edit', $publicacion->id_publicacion) }}" 
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
    {{ $publicaciones->links() }}
</div>
@endsection
