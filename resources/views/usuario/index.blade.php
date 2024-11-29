@extends('adminlte::page')

@section('title', 'DevShare - Usuarios')

@section('content_header')
    <h2 class="text-3xl font-bold mb-4">Usuarios Registrados</h2>
    <a href="{{ route('usuarios.bans') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mb-1 inline-block">Lista de Usuarios Baneados</a>
@stop

@section('content')
<div class="flex-1 bg-gray-100 overflow-y-auto h-screen">
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 border text-center">Nombre</th>
                    <th class="px-4 py-2 border text-center">Correo Electrónico</th>
                    <th class="px-4 py-2 border text-center">Foto de Perfil</th>
                    <th class="px-4 py-2 bordertext-center">Estado</th>
                    <th class="px-4 py-2 border text-center">Rol</th>
                    <th class="px-4 py-2 border text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border text-center">{{ $usuario->name }}</td>
                    <td class="px-4 py-2 border text-center">{{ $usuario->email }}</td>
                    <td class="px-4 py-2 border text-center">
                        <a href="{{ asset('storage/' . $usuario->profile_photo_path) }}" target="_blank" class="text-blue-500 hover:underline text-center">Ver Foto</a>
                    </td>
                    <td class="px-4 py-2 border text-center">{{ Str::limit($usuario->estado, 12) }}</td>
                    <td class="px-4 py-2 border text-center">{{ $usuario->rol }}</td>
                    <td class="px-4 py-2 border">
                        <div class="flex justify-between gap-2">
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" 
                            class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 text-sm text-center">
                                Editar
                            </a>
                            <a href="{{ route('usuarios.ban', $usuario->id) }}" 
                            class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 text-sm text-center">
                                Banear
                            </a>
                        </div>
                    </td>
                </tr>             
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div>
    {{ $usuarios->links() }}
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop