@extends('layouts.postiniciolayout')

@section('title', 'Agregar Categoria')

@section('content')
<h2 class="text-2xl font-bold mb-4">Agregar Categoria</h2>
<form action="{{ route('categorias.store') }}" method="POST" class="space-y-4">
    @csrf
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
        <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripcion de la Categoría</label>
        <input type="text" name="descripcion" required class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
    </div>
    
    <div class="flex space-x-4">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
        <button type="reset" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Limpiar</button>
        <a href="{{ route('categorias.index') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Regresar</a>
    </div>
</form>
@endsection