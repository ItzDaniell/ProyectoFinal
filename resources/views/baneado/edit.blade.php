@extends('adminlte::page')

@section('title', 'DevShare - Desbanear Usuario')

@section('content_header')
    <h2 class="text-3xl font-bold">Desbanear Usuario</h2>
@stop

@section('content')
<div class="flex-1 bg-gray-100 overflow-y-auto h-screen">
    <div class="overflow-x-auto">
        <form action="{{ route('usuarios.desbanned', $usuario->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
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
                <label for="nombres" class="block text-sm font-medium text-gray-700">Nombre del Usuario</label>
                <input type="text" name="nombres" value="{{ $usuario->name }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1 " readonly>
            </div>

            <div>
                <label for="correo" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email" name="correo" value="{{ $usuario->email }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
            </div>

            <div>
                <label for="comment" class="block text-sm font-medium text-gray-700">Comentarios</label>
                <textarea name="comment" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>{{ $ban ? $ban->comment : 'No hay comentarios disponibles' }}</textarea>
            </div>

            <div>
                <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                <input type="text" name="estado" value="{{ $usuario->estado }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly></input>
            </div>

            @if ($usuario->estado == 'Baneado Temporalmente')
            <div>
                <label for="fecha_baneo" class="block text-sm font-medium text-gray-700">Fecha de Baneo Temporal</label>
                <input type="date" name="fecha_baneo" value="{{ $ban && $ban->expired_at ? $ban->expired_at->format('Y-m-d') : '' }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
            </div>
            @endif

            <div>
                <label for="desbanear" class="inline-flex items-center">
                    <input type="checkbox" name="CheckDesbaneo" value="1" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <span class="ml-2 text-sm font-medium text-gray-700">Confirme el desbaneo del usuario</span>
                </label>
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Desbanear</button>
                <a href="{{ route('usuarios.bans') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Regresar</a>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
