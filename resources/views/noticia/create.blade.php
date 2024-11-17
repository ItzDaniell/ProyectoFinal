@extends('layouts.postiniciolayout')

@section('content')
<h2 class="text-2xl font-bold mb-4">Agregar Noticia</h2>
<form action="{{ route('noticias.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    <div>
        <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
        <input type="text" name="titulo" required class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
    </div>
    
    <div>
        <label for="autor" class="block text-sm font-medium text-gray-700">Autor</label>
        <input type="text" name="autor" required class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
    </div>
    
    <div>
        <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
        <textarea name="descripcion" rows="4" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1"></textarea>
    </div>
    
    <div>
        <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen</label>
        <input type="file" name="imagen" accept="image/*" class="mt-1 block w-full h-12 text-sm text-gray-500 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-4">
    </div>
    
    <div>
        <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
        <input type="url" name="URL" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
    </div>
    
    <div>
        <label for="categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
        <select name="id_categoria" required class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
            <option value="">[ SELECCIONE ]</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id_categoria }}">{{ $categoria->descripcion }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="flex space-x-4">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
        <button type="reset" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Limpiar</button>
    </div>
</form>
@endsection