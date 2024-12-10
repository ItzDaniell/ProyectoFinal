@extends('adminlte::page')

@section('title', 'DevShare - Agregar Conferencia')

@section('content_header')
    <h2 class="text-3xl font-bold">Agregar Conferencia</h2>
@stop

@section('content')
    <div class="overflow-x-auto">
        <form action="{{ route('conferencias.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
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
                <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" name="titulo" id="titulo" required
                    class="mt-1 block w-full h-10 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-2">
            </div>
            <div>
                <label for="categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
                <select name="id_categoria" id="categoria" required class="mt-1 block w-full h-10 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-2">
                    <option value="">[ SELECCIONE ]</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id_categoria }}">{{ $categoria->descripcion }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="ponente" class="block text-sm font-medium text-gray-700">Ponente</label>
                <select name="id_ponente" id="ponente" class="js-example-basic-single mt-1 mb-4 block w-full h-10 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-2">
                    <option value="" disabled selected>Escriba el nombre del ponente...</option>
                </select>
            </div>

            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="4" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-2"></textarea>
            </div>
            <div>
                <label for="duracion" class="block text-sm font-medium text-gray-700">Duración (En Minutos)</label>
                <input type="number" name="duracion" id="duracion" min="1" required class="mt-1 block w-full h-10 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-2">
            </div>
            <div>
                <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha y Hora de Inicio</label>
                <input type="datetime-local" name="fecha_hora_inicio" id="fecha_inicio" required class="mt-1 block w-full h-10 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-2">
            </div>
            <div>
                <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen</label>
                <input type="file" id="imagen" name="imagen" accept="image/*" required class="mt-1 block w-full h-12 text-sm text-gray-500 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-4">
                <div class="mt-4">
                    <img id="preview" src="#" alt="Imagen de la conferencia" class="hidden w-64 h-64 object-cover border border-gray-300">
                </div>
            </div>
            <label for="plataforma" class="block text-sm font-medium text-gray-700">Plataforma de la Conferencia</label>
            <select name="plataforma" id="plataforma" required class="mt-1 block w-full h-10 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-2">
                <option value="">[ SELECCIONE ]</option>
                <option value="Google Meet">Google Meet</option>
                <option value="Zoom">Zoom</option>
                <option value="Microsoft Teams">Microsoft Teams</option>
                <option value="Webex">Webex</option>
                <option value="Skype">Skype</option>
                <option value="Discord">Discord</option>
            </select>
            <div>
                <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                <input type="url" name="URL" id="url" required class="mt-1 block w-full h-10 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-2">
            </div>
            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
                <button id="clear-button" type="reset" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Limpiar</button>
                <a href="{{ route('conferencias.index') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Regresar</a>
            </div>
        </form>
    </div>
    @vite('resources/js/vista_previa.js')
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container .select2-selection--single {
            height: 2.5rem;
            line-height: 4rem;
        }
        .select2-container .select2-dropdown {
            max-height: 250px;
        }
    </style>
@stop

@section('js')
    <script>console.log("Hi, I'm using the Laravel-AdminLTE package!");</script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/i18n/es.js"></script>
    <script>
    $(document).ready(function() {
        $('#ponente').select2({
            placeholder: "Escriba el nombre del ponente",
            allowClear: true, // Permite limpiar la selección
            ajax: {
                url: "{{ route('ponentes.list') }}", // Ruta para obtener los ponentes
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: data.map(function (ponent) {
                            return {
                                id: ponent.id_ponente,     // id_ponente como value
                                text: ponent.nombres       // nombres como texto visible
                            };
                        })
                    };
                }
            }
        });
    });
    </script>
@stop
