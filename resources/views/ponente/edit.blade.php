@extends('layouts.postiniciolayout')

@section('content')
<h2 class="text-2xl font-bold mb-4">Editar Ponente</h2>
<form action="{{ route('ponentes.update', $ponente->id_ponente) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PATCH')
    
    <div>
        <label for="nombres" class="block text-sm font-medium text-gray-700">Nombres</label>
        <input type="text" name="nombres" required value="{{ $ponente->nombres }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
    </div>
    
    <div>
        <label for="correo" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
        <input type="email" name="correo" required value="{{ $ponente->correo }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
    </div>
    
    <div>
        <label for="biografia" class="block text-sm font-medium text-gray-700">Biografía</label>
        <textarea name="biografia" rows="4" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">{{ $ponente->biografia }}</textarea>
    </div>
    
    <div class="flex items-center space-x-10"> <!-- Aumenté el espacio horizontal -->
        <div>
            <label for="foto" class="block text-sm font-medium text-gray-700">Foto</label>
            <input type="file" name="foto" accept="image/*" class="mt-1 block h-12 text-sm text-gray-500 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-4">
        </div>
        @if ($ponente->foto)
            <div class="ml-4"> <!-- Añadí un margen izquierdo adicional -->
                <img src="{{ asset('storage/' . $ponente->foto) }}" alt="Foto del Ponente" class="w-24 h-24 rounded-full border border-gray-300">
            </div>
        @endif
    </div>
    
    <div class="flex space-x-4">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
        <button type="reset" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Limpiar</button>
        <a href="{{ route('ponentes.index') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Regresar</a>
    </div>
</form>
@endsection
