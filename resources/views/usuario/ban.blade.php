@extends('adminlte::page')

@section('title', 'DevShare - Banear Usuario')

@section('content_header')
    <h2 class="text-3xl font-bold">Banear Usuario</h2>
@stop

@section('content')
    <div class="overflow-x-auto">
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
                    <input type="checkbox" id="ban_permanente" name="ban_permanente" value="1" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <span class="ml-2 text-sm font-medium text-gray-700">Banear Permanentemente</span>
                </label>
            </div>

            <div id="ban_temporal">
                <label for="dias_baneo" class="block text-sm font-medium text-gray-700">Duración del Baneo (en días)</label>
                <select name="dias_baneo" id="dias_baneo" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
                    <option value="">Selecciona una duración</option>
                    <option value="1">1 día</option>
                    <option value="3">3 días</option>
                    <option value="5">5 días</option>
                    <option value="7">7 días</option>
                    <option value="15">15 días</option>
                    <option value="30">30 días</option>
                    <option value="45">45 días</option>
                    <option value="60">60 días</option>
                </select>
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Banear</button>
                <a href="{{ route('usuarios.index') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Regresar</a>
            </div>
        </form>
    </div>
    @vite("resources/js/check_form_ban.js")
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const banPermanenteCheckbox = document.getElementById("ban_permanente");
            const diasBaneoSelect = document.getElementById("dias_baneo");

            // Función para manejar el cambio de estado del checkbox
            const toggleRequired = () => {
                if (banPermanenteCheckbox.checked) {
                    diasBaneoSelect.removeAttribute("required");
                } else {
                    diasBaneoSelect.setAttribute("required", "required");
                }
            };

            // Detecta el cambio del checkbox
            banPermanenteCheckbox.addEventListener("change", toggleRequired);

            toggleRequired();
        });
    </script>
@stop
