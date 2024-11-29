@extends('adminlte::page')

@section('title', 'DevShare - Banear Usuario')

@section('content_header')
    <h2 class="text-3xl font-bold">Banear Usuario</h2>
@stop

@section('content')
<form action="{{ route('usuarios.banned', $usuario->id)}}" method="POST" enctype="multipart/form-data" class="space-y-4">
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
    @csrf
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
        <textarea name="comment" rows="4" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1"></textarea>
    </div>

    <div>
        <label for="ban_permanente" class="inline-flex items-center">
            <input type="checkbox" name="ban_permanente" value="1" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
            <span class="ml-2 text-sm font-medium text-gray-700">Banear Permanentemente</span>
        </label>
    </div>

    <div id="ban_temporal" class="hidden">
        <label for="fecha_baneo" class="block text-sm font-medium text-gray-700">Fecha de Baneo Temporal</label>
        <input type="date" name="fecha_baneo" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" required>
    </div>

    <div class="flex space-x-4">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Banear</button>
        <a href="{{ route('usuarios.index') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Regresar</a>
    </div>
</form>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
    <script>
        const banPermanenteCheckbox = document.querySelector('input[name="ban_permanente"]');
        const banTemporalDiv = document.getElementById('ban_temporal');
        const tiempo_ban = document.querySelector('input[name="fecha_baneo"]');
    
    
        if (!banPermanenteCheckbox.checked) {
            banTemporalDiv.classList.remove('hidden');
        }
    
        banPermanenteCheckbox.addEventListener('change', function() {
            if (this.checked) {
                banTemporalDiv.classList.add('hidden');
                tiempo_ban.required = false;
            } else {
                banTemporalDiv.classList.remove('hidden');
                tiempo_ban.required = true;
            }
        });
    </script>
@stop