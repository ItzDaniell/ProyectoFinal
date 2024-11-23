@extends('layouts.postiniciolayout')

@section('content')

@section('title', 'Lista de Publicaciones')
<div class="flex-1 p-4">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-3xl font-bold">Lista de Publicaciones</h1>
        <div class="flex space-x-4 relative">
            <div class="relative">
                <ion-icon name="search-outline" class="text-2xl cursor-pointer" id="searchIcon"></ion-icon>
                <div id="searchDropdown" class="hidden absolute right-0 w-96 mt-2 bg-white shadow-lg rounded-lg p-4">
                    <p class="text-sm pb-2">Buscar Publicación por título</p>
                    <form action="{{ route('publicacion.index') }}" method="get" class="flex">
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
                        <form action="{{ route('publicacion.index') }}" method="get" class="flex flex-col space-y-3">
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
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 border">Nombre de Usuario</th>
                    <th class="px-4 py-2 border">Categoria</th>
                    <th class="px-4 py-2 border">Título</th>
                    <th class="px-4 py-2 border">Descripción</th>
                    <th class="px-4 py-2 border">Imagen</th>
                    <th class="px-4 py-2 border">Estado</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($publicaciones as $publicacion)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border">{{ $publicacion->users->name }}</td>
                    <td class="px-4 py-2 border">{{ $publicacion->categoria->descripcion }}</td>
                    <td class="px-4 py-2 border">{{ $publicacion->titulo }}</td>
                    <td class="px-4 py-2 border">{{ Str::limit($publicacion->descripcion, 50)  ?? 'No disponible'}}</td>
                    <td class="px-4 py-2 border">
                        @if ($publicacion->imagen)
                            <a href="{{ asset('storage/' . $publicacion->imagen) }}" target="_blank" class="text-blue-500 hover:underline">Ver Imagen</a>
                        @else
                            Sin Imagen
                        @endif
                    </td>
                    <td class="px-4 py-2 border">{{ $publicacion->estado }}</td>
                    <td class="px-4 py-2 border">
                        <div class="flex justify-between gap-2">
                            <a href="{{ route('publicacion.edit', $publicacion->id_publicacion) }}" 
                            class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 text-sm text-center">
                                Editar
                            </a>
                        </div>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<div class="mt-4">
    {{ $publicaciones->links() }}
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
