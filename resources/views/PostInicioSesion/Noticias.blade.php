@extends('layouts.postiniciolayout')

@section('title', 'Noticias')

@section('content')
<div class="flex-1 p-4">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-3xl font-bold">Noticias</h1>
        <div class="flex space-x-4 relative">
            <!-- Icono de búsqueda -->
            <div class="relative">
                <ion-icon name="search-outline" class="text-2xl cursor-pointer" id="searchIcon"></ion-icon>
                <!-- Dropdown de búsqueda -->
                <div id="searchDropdown" class="hidden absolute right-0 w-96 mt-2 bg-white shadow-lg rounded-lg p-4">
                    <form action="" method="post" class="flex">
                        <input id="busqueda" type="text" placeholder="Buscar por Título de Noticia..." class="w-full p-2 border rounded-md text-sm">
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
    <!-- Noticia principal -->
    <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden mb-4">
        <div class="flex flex-col md:flex-row">
            <img src="{{ asset('storage/' . $ultimaNoticia->imagen) }}" alt="Noticia Principal" class="w-full md:w-1/2 object-cover">
            <div class="p-4 md:w-1/2">
                <h2 class="text-2xl font-bold mb-2">{{ $ultimaNoticia->titulo }}</h2>
                <p class="text-gray-500 font-semibold mb-2">{{ $ultimaNoticia->categoria->descripcion}}</p>
                <p class="text-gray-700 mb-4">{{ $ultimaNoticia->descripcion }}</p>
                <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Ver Detalles</button>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach ($noticias as $noticia)
        <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden">
            <img src="{{ asset('storage/' . $noticia->imagen) }}" alt="Noticia 1" class="w-full object-cover">
            <div class="p-4">
                <h3 class="text-xl font-bold mb-2">{{ $noticia->titulo }}</h3>
                <p class="text-gray-700 mb-4">{{ $noticia->categoria->descripcion }}</p>
                <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Ver Detalles</button>
            </div>
        </div>
    @endforeach
    </div>
<script>
    // Funcionalidad para abrir y cerrar el dropdown de búsqueda
    document.getElementById("searchIcon").addEventListener("click", function() {
        const searchDropdown = document.getElementById("searchDropdown");
        const busqueda = document.getElementById('busqueda')
        searchDropdown.classList.toggle("hidden");
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