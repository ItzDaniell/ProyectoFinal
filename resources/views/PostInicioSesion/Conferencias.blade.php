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
    <p class="text-sm text-gray-700 pb-5">Conferencias Activas : </p>
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-gray-200 shadow-md rounded-lg overflow-hidden">
            <img src="https://via.placeholder.com/400x200" alt="SQL" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-lg font-semibold mb-2">Fundamentos de SQL para Principiantes</h3>
                <p class="text-sm text-gray-700">Ponente: <span class="font-medium">Por definir</span></p>
                <p class="text-sm text-gray-700">Duración: <span class="font-medium">Por definir</span></p>
                <p class="text-sm text-gray-700">Fecha: <span class="font-medium">Por definir</span></p>
                <button class="mt-4 w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Ver Detalles</button>
            </div>
        </div>
    </div>
    <script>
        // Funcionalidad para abrir y cerrar el dropdown de búsqueda
        document.getElementById("searchIcon").addEventListener("click", function() {
            const searchDropdown = document.getElementById("searchDropdown");
            const busqueda = document.getElementById('busqueda')
            searchDropdown.classList.toggle("hidden");
            busqueda.textContent = "Buscar por Título de Publicación..."
        });

        // Funcionalidad para abrir y cerrar el dropdown de filtro
        document.getElementById("filterIcon").addEventListener("click", function() {
            const filterDropdown = document.getElementById("filterDropdown");
            filterDropdown.classList.toggle("hidden");
        });

        // Cerrar dropdown al hacer clic fuera de los iconos
        document.addEventListener("click", function(event) {
            if (!event.target.closest(".flex")) {
                document.getElementById("searchDropdown").classList.add("hidden");
                document.getElementById("filterDropdown").classList.add("hidden");
            }
        });
    </script>
@endsection