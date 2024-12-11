@extends('adminlte::page')

@section('title', 'DevShare - Editar Estado de Publicación')

@section('content_header')
    <h2 class="text-3xl font-bold mb-4">Editar Estado de Publicación</h2>
@stop

@section('content')
    <div class="overflow-x-auto">
        <form action="{{ route('publicacion.update', $publicacion->id_publicacion) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
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
                <input type="text" name="nombres" value="{{ $publicacion->users->name }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
            </div>

            <div>
                <label for="categoria" class="block text-sm font-medium text-gray-700">Categoria de la Publicación</label>
                <input type="text" name="categoria" value="{{ $publicacion->categoria->descripcion }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
            </div>

            <div>
                <label for="titulo" class="block text-sm font-medium text-gray-700">Título de la Publicación</label>
                <input type="text" name="titulo" value="{{ $publicacion->titulo }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
            </div>

            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="descripcion" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>{{ $publicacion->descripcion }}</textarea>
            </div>

            <div>
                <label for="archivo" class="block text-sm font-medium text-gray-700">Archivo de la Publicación</label>
                @if ($publicacion->archivo == 'Sin Archivo')
                    <input type="text" name="archivo" value="{{ $publicacion->archivo }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
                @else
                    <div class="mt-4">
                        <a href="{{ asset('storage/' . $publicacion->archivo) }}" target="_blank" class="text-blue-500 hover:underline">Ver archivo</a>
                    </div>
                @endif
            </div>

            <div>
                <label for="estado" class="block text-sm font-medium text-gray-700">Estado de la Publicación</label>
                <select name="estado" id="estado" required class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
                    <option value="Activo" {{ $publicacion->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                    <option value="Inactivo" {{ $publicacion->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Guardar</button>
                <a href="{{ route('publicacion.index') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Regresar</a>
            </div>
        </form>
    </div>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fileInput = document.querySelector('input[name="archivo"]');
            const previewContainer = document.createElement('div');
            const previewElement = document.createElement('div');

            previewContainer.classList.add('mt-4');
            previewElement.id = 'archivo-preview';
            previewContainer.appendChild(previewElement);
            fileInput.parentElement.appendChild(previewContainer);

            fileInput.addEventListener('change', function (event) {
                const file = event.target.files[0];
                previewElement.innerHTML = '';

                if (file) {
                    const fileExtension = file.name.split('.').pop().toLowerCase();

                    if (['jpg', 'jpeg', 'png', 'gif'].includes(fileExtension)) {
                        const img = document.createElement('img');
                        img.src = URL.createObjectURL(file);
                        img.alt = 'Vista previa de la imagen';
                        img.classList.add('w-64', 'h-64', 'object-cover', 'border', 'border-gray-300');
                        previewElement.appendChild(img);
                    } else {
                        const fileInfo = document.createElement('p');
                        fileInfo.textContent = `Archivo seleccionado: ${file.name}`;
                        fileInfo.classList.add('text-gray-600', 'text-sm', 'mt-2');
                        previewElement.appendChild(fileInfo);

                        const fileLink = document.createElement('a');
                        fileLink.href = URL.createObjectURL(file);
                        fileLink.target = '_blank';
                        fileLink.textContent = 'Abrir archivo';
                        fileLink.classList.add('text-blue-500', 'hover:underline', 'mt-2', 'block');
                        previewElement.appendChild(fileLink);
                    }
                }
            });
        });
    </script>
@stop
