@extends('adminlte::page')

@section('title', 'DevShare - Editar Rol de Usuario')

@section('content_header')
    <h2 class="text-3xl font-bold">Editar Rol de Usuario</h2>
@stop

@section('content')
    <div class="overflow-x-auto mb-4">
        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4 w-full">
            @csrf
            @method('PATCH')
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Usuario</label>
                <input type="text" name="name" required value="{{ $usuario->name }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
            </div>

            <div>
                <label for="autor" class="block text-sm font-medium text-gray-700">Correo del Usuario</label>
                <input type="text" name="autor" required value="{{ $usuario->email }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
            </div>

            <div>
                <label for="profile_photo_pat" class="block text-sm font-medium text-gray-700">Foto de Perfil</label>
                <div class="mt-4">
                    @if ($usuario->profile_photo_path)
                        <img id="preview" src="{{ asset('storage/' . $usuario->profile_photo_path) }}" alt="Foto del Usuario" class="w-32 h-32 object-cover border border-gray-300 rounded-full">
                    @elseif (!empty($usuario->avatar) && filter_var($usuario->avatar, FILTER_VALIDATE_URL))
                        <img class="w-32 h-32 object-cover border border-gray-300 rounded-full" src="{{ preg_match('/^https?:\/\//', $usuario->avatar) ? $usuario->avatar : 'https://' . ltrim($usuario->avatar, '/') }}" alt="Foto de perfil del usuario">
                    @else
                        <img class="w-32 h-32 object-cover border border-gray-300 rounded-full" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Foto de perfil predeterminada">
                    @endif
                </div>
            </div>

            <div>
                <label for="rol" class="block text-sm font-medium text-gray-700">Rol del Usuario</label>
                <select name="rol" id="rol" required
                        class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
                    @foreach ($roles as $rol)
                        <option value="{{ $rol }}" {{ $usuario->hasRole($rol) ? 'selected' : '' }}>
                            {{ ucfirst($rol) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
                <a href="{{ route('usuarios.index') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Regresar</a>
            </div>
        </form>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
