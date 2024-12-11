@extends('layouts.postiniciolayout')

@section('title', 'Comentarios de la Publicación')

@section('content')
    <div class="max-w-6xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Contenedor principal en dos columnas -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6" style="min-height: 94vh;">
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold text-blue-600 mb-4">{{ $publicacion->titulo }}</h2>
                <!-- Mostrar portada del archivo PDF -->
                @if (pathinfo($publicacion->archivo, PATHINFO_EXTENSION) === 'pdf')
                    <div class="mt-4 h-full">
                        <h3 class="font-semibold text-lg text-blue-500 mb-5">Archivo PDF publicado</h3>
                        <div class="relative w-full h-5/6 overflow-hidden">
                            <iframe src="{{ asset('storage/'.$publicacion->archivo) }}" width="100%" height="100%"></iframe>
                        </div>
                    </div>
                @endif
                @if (in_array(pathinfo($publicacion->archivo, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg']))
                    <div class="mt-4">
                        <h3 class="font-semibold text-lg text-blue-500 mb-5">Imagen publicada</h3>
                        <div class="relative w-full h-5/6 overflow-hidden">
                            <img src="{{ asset('storage/'.$publicacion->archivo) }}" alt="Imagen publicada" class="w-full h-auto object-cover">
                        </div>
                    </div>
                @endif
            </div>
            <!-- Sección de comentarios a la derecha -->
            <div class="flex flex-col w-full">
                <!-- Encabezado del autor -->
                <div class="flex items-center justify-between pl-4 pr-4 pt-4 pb-2 bg-gray-50 rounded-t-lg">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gray-400 rounded-full flex items-center justify-center">
                            @if ($publicacion->users->profile_photo_path)
                                <img class="w-full h-full object-cover rounded-full"
                                     src="{{ asset($publicacion->users->profile_photo_path) }}"
                                     alt="Foto de perfil del usuario">
                            @elseif ($publicacion->users->avatar)
                                <img class="w-full h-full object-cover rounded-full"
                                     src="{{ $publicacion->users->avatar }}"
                                     alt="Foto de perfil del usuario">
                            @else
                                <img class="w-full h-full object-cover"
                                     src="https://cdn-icons-png.flaticon.com/512/149/149071.png"
                                     alt="Foto de perfil predeterminada">
                            @endif
                        </div>
                        <div>
                            <!-- Bloque combinado de nombre de usuario, fecha de publicación y descripción -->
                            <div class="space-y-1">
                                <p class="text-sm font-medium">{{ $publicacion->users->name }}</p>
                                <p class="text-xs text-gray-600">Publicado: {{ $publicacion->created_at->diffForHumans() }}</p>
                            </div>
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
                                        <a href="{{ route('PerfilUsuario') }}" id="openReportButton"
                                           class="w-full block px-4 py-2 text-left">Ir Al Perfil</a>
                                    </li>
                                    <li class="border-b border-gray-300 py-2 cursor-pointer hover:bg-gray-300">
                                        <a href="{{ route('Configuracion') }}" id="openReportButton"
                                           class="w-full block px-4 py-2 text-left">Configuración</a>
                                    </li>
                                @else
                                    <li class="border-b border-gray-300 py-2 cursor-pointer hover:bg-gray-300">
                                        <a href="{{ route('PerfilUsuario', $publicacion->users->slug) }}"
                                           id="openReportButton"
                                           class="w-full block px-4 py-2 text-left">Ir Al Perfil</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-between pl-4 pr-4 pb-2 bg-gray-50 rounded-t-lg">
                    <p class="text-gray-800 text-xs max-w-full md:max-w-lg">{{ $publicacion->descripcion }}</p>
                </div>
                <!-- Lista de comentarios con scroll -->
                <div class="space-y-4 overflow-y-auto max-h-[50vh] p-4 mt-2 mb-4 bg-white flex-grow">
                    @foreach ($comentarios as $comentario)
                    <div class="bg-gray-100 p-4 rounded-lg shadow-sm flex space-x-4">
                        <!-- Foto de perfil a la izquierda -->
                        <div class="w-12 h-12 bg-gray-400 rounded-full flex items-center justify-center">
                            @if ($comentario->users->profile_photo_path)
                                <img class="w-full h-full object-cover rounded-full"
                                     src="{{ asset($comentario->users->profile_photo_path) }}"
                                     alt="Foto de perfil del usuario">
                            @elseif ($comentario->users->avatar)
                                <img class="w-full h-full object-cover rounded-full"
                                     src="{{ $comentario->users->avatar }}"
                                     alt="Foto de perfil del usuario">
                            @else
                                <img class="w-full h-full object-cover"
                                     src="https://cdn-icons-png.flaticon.com/512/149/149071.png"
                                     alt="Foto de perfil predeterminada">
                            @endif
                        </div>
                        <!-- Contenido del comentario -->
                        <div class="flex-1">
                            <p class="text-gray-800 font-semibold">{{ $comentario->users->name }}</p>
                            <p class="text-gray-600 text-xs">{{ $comentario->contenido }}</p>
                            <span class="text-gray-400 text-xs">{{ $comentario->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                @endforeach
                </div>
                <!-- Input para añadir comentario (al pie del div) -->
                <div class="flex pr-4 pl-4 bg-white mt-auto items-center justify-center">
                    <form action="{{ route('comentarios.store', $publicacion->slug) }}" method="POST" class="flex space-x-4 w-full max-w-3xl">
                        <div class="w-12 h-12 bg-gray-400 rounded-full flex items-center justify-center">
                            @if (Auth::user()->profile_photo_path)
                                <img class="w-full h-full object-cover rounded-full"
                                     src="{{ asset(Auth::user()->profile_photo_path) }}"
                                     alt="Foto de perfil del usuario">
                            @elseif (Auth::user()->avatar)
                                <img class="w-full h-full object-cover rounded-full"
                                     src="{{ Auth::user()->avatar }}"
                                     alt="Foto de perfil del usuario">
                            @else
                                <img class="w-full h-full object-cover"
                                     src="https://cdn-icons-png.flaticon.com/512/149/149071.png"
                                     alt="Foto de perfil predeterminada">
                            @endif
                        </div>
                        @csrf
                        <input name="contenido" class="flex-1 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Añade un comentario..." required></input>
                        <button type="submit" class="flex items-center justify-center">
                            <ion-icon name="paper-plane-outline" class="text-2xl text-gray-600"></ion-icon>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @vite('resources/js/opciones_publicacion.js')
@endsection
