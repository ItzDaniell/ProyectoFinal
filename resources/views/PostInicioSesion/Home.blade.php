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
            <!-- Mostrar archivo adjunto si existe -->
            @if ($publicacion->imagen === null && $publicacion->archivo !== null)
            <div class="mt-4">
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
                @elseif(in_array($extension, ['doc', 'docx']))
                    <div class="flex items-center space-x-2">
                        <ion-icon name="document-outline" class="text-2xl text-gray-600"></ion-icon>
                        <a href="{{ asset('storage/' . $publicacion->archivo) }}" class="text-blue-600 hover:text-blue-800" download>
                            Descargar documento ({{ strtoupper($extension) }})
                        </a>
                    </div>
                @elseif($extension == 'pdf')
                    <div class="flex items-center space-x-2">
                        <ion-icon name="document-pdf-outline" class="text-2xl text-red-600"></ion-icon>
                        <a href="{{ asset('storage/' . $publicacion->archivo) }}" class="text-blue-600 hover:text-blue-800" download>
                            Descargar PDF
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
            </div>
            @endif
        </div>
        <div class="p-4 bg-gray-200 rounded-b-lg flex justify-center align-middle">
            <button class="btn-comentar flex items-center align-middle space-x-2 text-gray-800 hover:text-gray-600 hover:bg-gray-300 px-3 py-2 rounded transition duration-200" data-id="{{ $publicacion->slug }}">
                <ion-icon class="text-2xl text-gray-600" name="paper-plane-outline"></ion-icon>
                <span>Comentar Publicación</span>
            </button>
        </div>
    </div>
    <div id="modal-comentarios" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg max-w-lg w-full">
            <div class="flex justify-between items-center p-4 border-b">
                <h2 class="text-xl font-semibold">Comentarios</h2>
                <button id="cerrar-modal" class="text-gray-600 hover:text-gray-800 flex items-center">
                    <ion-icon class="text-2xl text-gray-600" name="close-outline"></ion-icon>
                </button>
            </div>
            <div class="p-4">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center">
                        @if ($publicacion->users->profile_photo_path)
                            <img class="w-full h-full object-cover rounded-full" src="{{ asset($publicacion->users->profile_photo_path) }}"alt="Foto de perfil del usuario">
                        @elseif ($publicacion->users->avatar)
                            <img class="w-full h-full object-cover rounded-full" src="{{ $publicacion->users->avatar }}" alt="Foto de perfil del usuario">
                        @else
                            <img class="w-full h-full object-cover" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Foto de perfil predeterminada">
                        @endif
                    </div>
                    <textarea class="w-4/5 p-2 border rounded-md text-sm" rows="2" placeholder="Escribe tu comentario..."></textarea>
                    <ion-icon class="text-2xl text-gray-600 cursor-pointer" name="paper-plane-outline"></ion-icon>
                </div>
            </div>
            <div class="p-4 border-t">
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center">
                            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Foto de perfil" class="rounded-full w-full h-full object-cover">
                        </div>
                        <div>
                            <p class="text-sm font-medium">Nombre del Usuario</p>
                            <p class="text-xs text-gray-600">Hace 1 día</p>
                            <p class="text-sm text-gray-800">Este es un comentario de ejemplo.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <script>
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('modal-comentarios');
    const cerrarModal = document.getElementById('cerrar-modal');
    const botonesComentar = document.querySelectorAll('.btn-comentar');

    // Mostrar el modal al presionar el botón
    botonesComentar.forEach((boton) => {
        boton.addEventListener('click', () => {
            const publicacionId = boton.dataset.id;
            console.log(`ID de la publicación: ${publicacionId}`); // Puedes usar este ID para cargar los comentarios desde el backend.

            // Mostrar modal y deshabilitar scroll en el fondo
            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        });
    });

    // Ocultar el modal
    cerrarModal.addEventListener('click', () => {
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden'); // Habilitar scroll nuevamente
    });
});
    </script>
    @vite(['resources/js/opciones_publicacion.js'])
@endsection
