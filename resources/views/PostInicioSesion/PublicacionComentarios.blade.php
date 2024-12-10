@extends('layouts.postiniciolayout')

@section('title', 'Comentarios de la Publicación')

@section('content')
    <div class="max-w-6xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Contenedor principal en dos columnas -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6" style="min-height: 80vh;">
            <!-- Publicación a la izquierda -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold text-blue-600 mb-4">{{ $publicacion->titulo }}</h2>
                <p class="text-gray-800 mb-4">{{ $publicacion->descripcion }}</p>
                <span class="text-gray-400 text-sm">
                    Publicado por: {{ $publicacion->users->name }} | {{ $publicacion->created_at->diffForHumans() }}
                </span>
            </div>

            <!-- Sección de comentarios a la derecha -->
            <div class="flex flex-col">
                <!-- Encabezado del autor -->
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-t-lg">
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
                <!-- Lista de comentarios con scroll -->
                <div class="space-y-4 overflow-y-auto max-h-[40vh] p-4 bg-white">
                    @foreach ($comentarios as $comentario)
                        <div class="bg-gray-100 p-4 rounded-lg shadow-sm">
                            <p class="text-gray-800 font-semibold">{{ $comentario->users->name }}</p>
                            <p class="text-gray-600">{{ $comentario->contenido }}</p>
                            <span class="text-gray-400 text-sm">{{ $comentario->created_at->diffForHumans() }}</span>
                        </div>
                    @endforeach
                </div>
                <!-- Input para añadir comentario -->
                <div class="flex mt-6 p-4 bg-white">
                    <form action="{{ route('comentarios.store', $publicacion->slug) }}" method="POST" class="flex">
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
                        @csrf
                        <input name="contenido" class="w-96 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Añade un comentario..." required></input>
                        <button class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@vite('resources/js/opciones_publicacion.js')
@endsection
