@extends('adminlte::page')

@section('title', 'DevShare - Editar Estado del Comentario')

@section('content_header')
    <h2 class="text-3xl font-bold mb-4">Editar Estado del Comentario</h2>
@stop

@section('content')
    <div class="overflow-x-auto">
        <form action="{{ route('comentarios.update', $comentario->id_comentario) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
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
                <label for="nombres" class="block text-sm font-medium text-gray-700">Nombre de la Publicación</label>
                <input type="text" name="nombres" value="{{ $comentario->publicacion->titulo }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
            </div>

            <div>
                <label for="nombres" class="block text-sm font-medium text-gray-700">Nombre del Usuario</label>
                <input type="text" name="nombres" value="{{ $comentario->users->name }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
            </div>

            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Comentario del usuario</label>
                <textarea name="descripcion" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>{{ $comentario->contenido }}</textarea>
            </div>

            <div>
                <label for="estado" class="block text-sm font-medium text-gray-700">Estado de la Publicación</label>
                <select name="estado" id="estado" required class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
                    <option value="Activo" {{ $comentario->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                    <option value="Inactivo" {{ $comentario->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Guardar</button>
                <a href="{{ route('comentarios.index') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Regresar</a>
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
