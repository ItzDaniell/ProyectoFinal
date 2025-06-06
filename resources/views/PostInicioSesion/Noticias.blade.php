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
    @if ($noticias->count() != 0)
    <!-- Última noticia destacada -->
    @php $ultimaNoticia = $noticias->first(); @endphp
    <!-- Noticia principal -->
    <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden mb-4">
        <div class="flex flex-col md:flex-row">
            <img src="{{ asset('storage/' . $ultimaNoticia->imagen) }}" alt="Noticia Principal" class="w-full h-80 md:w-1/2 object-cover">
            <div class="p-4 md:w-1/2">
                <h2 class="text-2xl font-bold mb-2">{{ $ultimaNoticia->titulo }}</h2>
                <p class="text-gray-500 font-semibold mb-2">{{ $ultimaNoticia->categoria->descripcion}}</p>
                <p class="text-gray-700 mb-4">{{  Str::limit($ultimaNoticia->descripcion, 200)}}</p>
                <a href="{{ route('DetalleNoticia', urlencode($ultimaNoticia->titulo)) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Ver Detalles</a>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach ($noticias as $noticia)
        <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden">
            <img src="{{ asset('storage/' . $noticia->imagen) }}" alt="Noticia 1" class="w-full h-80 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-bold mb-2">{{ $noticia->titulo }}</h3>
                <p class="text-gray-700 mb-4">{{ $noticia->categoria->descripcion }}</p>
                <a href="{{ route('DetalleNoticia', urlencode($noticia->titulo)) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Ver Detalles</a>
            </div>
        </div>
    @endforeach
    </div>
    @endif
</div>
@endsection
@vite('resources/js/mostrar_modal_busq_cat.js')