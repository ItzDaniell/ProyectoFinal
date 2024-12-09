@extends('layouts.postiniciolayout')

@section('title', 'Conferencias')

@section('content')
<div class="flex-1 p-4">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-3xl font-bold">Conferencias</h1>
        <div class="flex space-x-4 relative">
            <!-- Icono de búsqueda -->
            <div class="relative">
                <ion-icon name="search-outline" class="text-2xl cursor-pointer" id="searchIcon"></ion-icon>
                <!-- Dropdown de búsqueda -->
                <div id="searchDropdown" class="hidden absolute right-0 w-80 mt-2 bg-white shadow-lg rounded-lg p-4">
                    <form action="" method="post" class="flex">
                        <input id="busqueda" type="text" placeholder="Buscar por Título de Conferencia..." class="w-full p-2 border rounded-md text-sm">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
                    </form>
                </div>
            </div>
            <!-- Icono de filtro -->
            <div class="relative">
                <ion-icon name="funnel-outline" class="text-2xl cursor-pointer" id="filterIcon"></ion-icon>
                <!-- Dropdown de filtro -->
                <div id="filterDropdown" class="hidden absolute right-0 w-80 mt-2 bg-white shadow-lg rounded-lg p-4">
                    <div class="flex flex-col space-y-2">
                        <label class="text-sm">Filtrar por Categoría</label>
                        <select name="id_categoria" class="p-2 border rounded-md text-sm">
                            <option value="">[ SELECCIONE ]</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id_categoria }}">{{ $categoria->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="text-sm text-gray-700 pb-5">Conferencias Activas : {{ $conferencias->count() }} </p>
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach ($conferencias as $conferencia )
        <div class="bg-gray-200 shadow-md rounded-lg overflow-hidden">
            <img src="{{ asset('storage/' . $conferencia->imagen) }}" alt="Imagen de la Conferencia" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-lg font-semibold mb-2">{{ $conferencia->titulo }}</h3>
                <p class="text-sm text-gray-700">Categoría: <span class="font-medium">{{ $conferencia->categoria->descripcion }}</span></p>
                <p class="text-sm text-gray-700">Ponente: <span class="font-medium">{{ $conferencia->ponente->nombres }}</span></p>
                <p class="text-sm text-gray-700">Duración: <span class="font-medium">{{ $conferencia->duracion }} Minutos</span></p>
                <p class="text-sm text-gray-700">Plataforma: <span class="font-medium">{{ $conferencia->plataforma }} </span></p>
                <p class="text-sm text-gray-700">Fecha y Hora de Inicio: <span class="font-medium">{{ $conferencia->fecha_hora_inicio }}</span></p>
                <a href="{{ route('DetalleConferencia', $conferencia->slug) }}"><button class="mt-4 w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Ver Detalles</button></a>
            </div>
        </div>
        @endforeach
    </div>
@endsection
@vite('resources/js/mostrar_modal_busq_cat.js')
