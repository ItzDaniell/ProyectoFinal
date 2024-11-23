@extends('layouts.postiniciolayout')

@section('title', 'Noticias')

@section('content')
<div class="flex-1 p-4">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-3xl font-bold">Noticias</h1>
        <div class="flex space-x-4 relative">
            <div class="relative">
                <ion-icon name="search-outline" class="text-2xl cursor-pointer" id="searchIcon"></ion-icon>
                <div id="searchDropdown" class="hidden absolute right-0 w-96 mt-2 bg-white shadow-lg rounded-lg p-4">
                    <p class="text-sm pb-2">Buscar Noticia por título</p>
                    <form action="{{ route('Noticias') }}" method="get" class="flex">
                        <input name="busqueda" type="text" placeholder="Buscar por Título..." class="w-full p-2 border rounded-md text-sm mr-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
                    </form>
                </div>
            </div>
        
            <div class="relative">
                <ion-icon name="funnel-outline" class="text-2xl cursor-pointer" id="filterIcon"></ion-icon>
                <div id="filterDropdown" class="hidden absolute right-0 w-80 mt-2 bg-white shadow-lg rounded-lg p-4">
                    <div class="flex flex-col space-y-2">
                        <p class="text-sm">Filtrar por Categoría</p>
                        <form action="{{ route('Noticias') }}" method="get" class="flex flex-col space-y-3">
                            <select name="categoria" class="p-2 border rounded-md text-sm">
                                <option value="0">[ SELECCIONE ]</option>
                                <option value="0">Mostrar Todo</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->descripcion }}">{{ $categoria->descripcion }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @if ($noticias->count() != 0)
        <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden mb-4">
                <div class="flex flex-col md:flex-row">
                    <!-- Imagen de la noticia -->
                    <img src="{{ asset('storage/' . $ultimaNoticia->imagen) }}" 
                        alt="{{ $ultimaNoticia->titulo }}" 
                        class="w-full h-80 md:w-1/2 object-cover">
                    
                    <!-- Contenido de la noticia -->
                    <div class="p-4 md:w-1/2">
                        <!-- Título de la noticia -->
                        <h2 class="text-2xl font-bold mb-2">{{ $ultimaNoticia->titulo }}</h2>
                        
                        <!-- Categoría de la noticia -->
                        <p class="text-gray-500 font-semibold mb-2">{{ $ultimaNoticia->categoria->descripcion }}</p>
                        
                        <!-- Descripción de la noticia -->
                        <p class="text-gray-700 mb-4">{{ $ultimaNoticia->descripcion }}</p>
                        
                        <!-- Botón para ver detalles -->
                        <a href="" 
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Ver Detalles
                        </a>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($noticias as $noticia)
                <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $noticia->imagen) }}" alt="Noticia 1" class="w-full h-60 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-bold mb-2">{{ $noticia->titulo }}</h3>
                        <p class="text-gray-700 mb-4">{{ $noticia->categoria->descripcion }}</p>
                        <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Ver Detalles</button>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    @else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 justify-center">
        <p>Sin Noticias por el momento</p>
    </div>
    @endif
 
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