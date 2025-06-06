@extends('adminlte::page')

@section('title', 'DevShare - Conferencias')

@section('content_header')
    <h2 class="text-3xl font-bold">Editar Noticia</h2>
@stop

@section('content')
    <div class="overflow-x-auto mb-4">
        <form action="{{ route('noticias.update', $noticia->id_noticia) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
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
                <label for="titulo" class="block text-sm font-medium text-gray-700">Titulo de la Noticia</label>
                <input type="text" name="titulo" required value="{{ $noticia->titulo }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
            </div>

            <div>
                <label for="autor" class="block text-sm font-medium text-gray-700">Autor de la Noticia</label>
                <input type="text" name="autor" required value="{{ $noticia->autor }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
            </div>

            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripcion de la Noticia</label>
                <textarea type="text" rows="4" name="descripcion" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">{{ $noticia->descripcion }} </textarea>
            </div>

            <div>
                <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen de la Noticia</label>
                <input type="file" id="imagen" name="imagen" accept="image/*" class="mt-1 block w-full h-12 text-sm text-gray-500 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-4" onchange="previewImage(event)">
                <div class="mt-4">
                    <img id="preview" src="{{ Storage::url($noticia->imagen) }}" alt="Imagen de la Noticia" class="w-64 h-64 object-cover border border-gray-300">
                </div>
            </div>

            <div>
                <label for="url" class="block text-sm font-medium text-gray-700">URL de la Noticia</label>
                <input type="text" name="URL" required value="{{ $noticia->URL }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
            </div>

            <div>
                <label for="categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
                <select name="id_categoria" required class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
                    <option value="">[ SELECCIONE ]</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id_categoria }}" {{ $noticia->id_categoria == $categoria->id_categoria ? 'selected' : '' }}>
                            {{ $categoria->descripcion }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="estado" class="block text-sm font-medium text-gray-700">Estado de la Noticia</label>
                <select name="estado" id="estado" required class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
                    <option value="Activo" {{ $noticia->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                    <option value="Borrador" {{ $noticia->estado == 'Borrador' ? 'selected' : '' }}>Borrador</option>
                    <option value="Inactivo" {{ $noticia->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
                <a href="{{ route('noticias.index') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Regresar</a>
            </div>
        </form>
        @vite('resources/js/vista_previa.js')
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
