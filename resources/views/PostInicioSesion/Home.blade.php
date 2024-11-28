@extends('layouts.postiniciolayout')

@section('title', 'Home')

@section('content')
<div class="flex-1 p-4">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-3xl font-bold">Inicio</h1>
        <div class="flex space-x-4 relative">
            <div class="relative">
                <ion-icon name="search-outline" class="text-2xl cursor-pointer" id="searchIcon"></ion-icon>
                <div id="searchDropdown" class="hidden absolute right-0 w-96 mt-2 bg-white shadow-lg rounded-lg p-4">
                    <p class="text-sm pb-2">Buscar Publicación por título</p>
                    <form action="{{ route('Home') }}" method="get" class="flex">
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
                        <form action="{{ route('Home') }}" method="get" class="flex flex-col space-y-3">
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
    @foreach ($publicaciones as $publicacion)
    <div class="max-w-lg mx-auto bg-gray-100 rounded-lg shadow-lg mb-6 mb-4">
        <div class="flex items-center justify-between p-4 bg-gray-200 rounded-t-lg">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gray-400 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-4.42 0-8 1.79-8 4v2h16v-2c0-2.21-3.58-4-8-4z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium">{{ $publicacion->users->name }}</p>
                    <p class="text-xs text-gray-600">Publicado: {{ $publicacion->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <button id="openModalButton" class="text-gray-600">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 12h12M6 6h12M6 18h12" />
                </svg>
            </button>
        </div>
        @if ($publicacion->imagen !== null)
        <div class="bg-gray-100">
            <img src="{{ asset('storage/' . $publicacion->imagen) }}" alt="Imagen de la Publicación" 
                class="w-full max-h-96 object-cover border border-gray-300">
        </div>
        @endif
        <div class="p-4">
            <h3 class="text-lg font-bold">{{ $publicacion->titulo}}</h3>
            <p class="text-sm text-gray-600">
                {{ $publicacion->categoria->descripcion }}
            </p>
            <p class="text-sm text-gray-600">
                {{ $publicacion->descripcion }}
            </p>
        </div>
        <div class="p-4 bg-gray-200 rounded-b-lg flex justify-center align-middle ">
            <button class="flex items-center align-middle space-x-2 text-gray-800 hover:text-gray-600 hover:bg-gray-300 px-3 py-2 rounded transition duration-200">
                <span>Comentar Publicación</span>
            </button>
        </div>
    </div>
    @endforeach
@endsection
