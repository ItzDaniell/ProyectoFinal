@extends('layouts.postiniciolayout')

@section('content')
<h2 class="text-2xl font-bold mb-4">Lista de Usuarios</h2>

<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-4 py-2 border">Nombre</th>
                <th class="px-4 py-2 border">Correo Electrónico</th>
                <th class="px-4 py-2 border">Foto de Perfil</th>
                <th class="px-4 py-2 border">Estado</th>
                <th class="px-4 py-2 border">Rol</th>
                <th class="px-4 py-2 border">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr class="hover:bg-gray-100">
                <td class="px-4 py-2 border">{{ $usuario->name }}</td>
                <td class="px-4 py-2 border">{{ $usuario->email }}</td>
                <td class="px-4 py-2 border">
                    <a href="{{ asset('storage/' . $usuario->profile_photo_path) }}" target="_blank" class="text-blue-500 hover:underline">Ver Foto</a>
                </td>
                <td class="px-4 py-2 border">{{ $usuario->estado }}</td>
                <td class="px-4 py-2 border">{{ $usuario->rol }}</td>
                <td class="px-4 py-2 border">
                    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 text-sm">Editar</a>
                    {{-- 
                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 text-sm">Eliminar</button>
                    </form>
                    --}}
                </td>
            </tr>             
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $usuarios->links() }}
</div>
@endsection