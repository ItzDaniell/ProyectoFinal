@extends('layouts.postiniciolayout')

@section('title', 'Home')

@section('content')
<div class="flex-1 p-4">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-3xl font-bold">Página Principal</h1>
        <div class="flex space-x-4 relative">
            <div class="relative">
                <ion-icon name="search-outline" class="text-2xl cursor-pointer" id="searchIcon"></ion-icon>
                <div id="searchDropdown" class="hidden absolute z-50 right-0 w-96 mt-2 bg-white shadow-lg rounded-lg p-4">
                    <p class="text-sm pb-2">Buscar Publicación por título</p>
                    <form action="{{ route('Home') }}" method="get" class="flex">
                        <input name="busqueda" type="text" placeholder="Buscar por Título..." class="w-full p-2 border rounded-md text-sm mr-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
                    </form>
                </div>
            </div>
            <div class="relative">
                <ion-icon name="funnel-outline" class="text-2xl cursor-pointer" id="filterIcon"></ion-icon>
                <div id="filterDropdown" class="hidden absolute z-50 right-0 w-80 mt-2 bg-white shadow-lg rounded-lg p-4">
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
                <div class="w-12 h-12 bg-gray-400 rounded-full flex items-center justify-center">
                    @if ($publicacion->users->profile_photo_path)
                        <img class="w-full h-full object-cover rounded-full" src="{{ asset($publicacion->users->profile_photo_path) }}"alt="Foto de perfil del usuario">
                    @elseif ($publicacion->users->avatar)
                        <img class="w-full h-full object-cover rounded-full" src="{{ $publicacion->users->avatar }}" alt="Foto de perfil del usuario">
                    @else
                        <img class="w-full h-full object-cover" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Foto de perfil predeterminada">
                    @endif
                </div>
                <div>
                    <p class="text-sm font-medium">{{ $publicacion->users->name }}</p>
                    <p class="text-xs text-gray-600">Publicado: {{ $publicacion->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <div class="relative">
                <button class="options-button text-gray-600">
                    <ion-icon class="text-2xl text-gray-600" name="ellipsis-horizontal"></ion-icon>
                </button>
                <div class="options-menu absolute right-0 mt-2 w-48 bg-gray-200 rounded-lg shadow-lg hidden">
                    <ul class="text-center">
                        @if ($publicacion->users->id === Auth::id())
                        <li class="border-b border-gray-300 py-2 cursor-pointer hover:bg-gray-300">
                            <a href="{{ route('PerfilUsuario') }}" id="openReportButton" class="w-full block px-4 py-2 text-left">Ir Al Perfil</a>
                        </li>
                        <li class="border-b border-gray-300 py-2 cursor-pointer hover:bg-gray-300">
                            <a href="{{ route('Configuracion') }}" id="openReportButton" class="w-full block px-4 py-2 text-left">Configuración</a>
                        </li>
                        @else
                        <li class="border-b border-gray-300 py-2 cursor-pointer hover:bg-gray-300">
                            <a href="{{ route('PerfilUsuario', $publicacion->users->slug ) }}" id="openReportButton" class="w-full block px-4 py-2 text-left">Ir Al Perfil</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="p-4">
            <h3 class="text-lg font-bold">{{ $publicacion->titulo}}</h3>
            <p class="text-sm text-gray-600">{{ $publicacion->descripcion }}</p>
            <p class="text-sm text-gray-600">Categoría : {{ $publicacion->categoria->descripcion }}</p>

            @if (pathinfo($publicacion->archivo, PATHINFO_EXTENSION) === 'pdf')
            <div class="h-full">
                <p class="text-sm text-gray-600">Archivo adjunto:</p>
                <div class="mt-4" style="height:450px">
                    <div class="relative w-full h-full overflow-hidden">
                        <iframe src="{{ asset('storage/' . $publicacion->archivo) }}" width="100%" height="100%"></iframe>
                    </div>
                </div>
            </div>
                @if ($publicacion->URL)
                <div>
                    <p class="mt-4 text-sm text-gray-600">Link del proyecto:</p>
                    <a href="{{ $publicacion->URL }}" class="text-blue-600 hover:text-blue-800" download>
                        Ir al enlace
                    </a>
                </div>
                @endif
            @endif
            {{--             <div class="mt-4" style="height: 500px;">
                <p class="text-sm text-gray-600">Archivo adjunto:</p>
                @php
                    $extension = pathinfo($publicacion->archivo, PATHINFO_EXTENSION);
                @endphp
                @if(in_array($extension, ['rar', 'zip']))
                    <div class="flex items-center space-x-2">
                        <ion-icon name="archive-outline" class="text-2xl text-gray-600"></ion-icon>
                        <a href="{{ asset('storage/' . $publicacion->archivo) }}" class="text-blue-600 hover:text-blue-800" download>
                            Descargar archivo ({{ strtoupper($extension) }})
                        </a>
                    </div>
                @else
                    <div class="flex items-center space-x-2">
                        <ion-icon name="image-outline" class="text-2xl text-gray-600"></ion-icon>
                        <a href="{{ asset('storage/' . $publicacion->archivo) }}" class="text-blue-600 hover:text-blue-800" download>
                            Descargar archivo
                        </a>
                    </div>
                @endif
            </div>
            <div class="mt-4">
                <p class="text-sm text-gray-600">Link del proyecto:</p>
                <a href="{{ $publicacion->URL }}" class="text-blue-600 hover:text-blue-800" download>
                    Ir al enlace
                </a>
            </div> --}}

        </div>
        <div class="p-4 bg-gray-200 rounded-b-lg flex justify-center align-middle">
            <a href="{{ route('PublicacionComentarios', $publicacion->slug)  }}" class="btn-comentar flex items-center align-middle space-x-2 text-gray-800 hover:text-gray-600 hover:bg-gray-300 px-3 py-2 rounded transition duration-200" data-id="{{ $publicacion->id }}">
                <ion-icon class="text-2xl text-gray-600" name="paper-plane-outline"></ion-icon>
                <span>Comentar Publicación</span>
            </a>
        </div>
    </div>
    @endforeach
@vite(['resources/js/opciones_publicacion.js'])
@endsection
