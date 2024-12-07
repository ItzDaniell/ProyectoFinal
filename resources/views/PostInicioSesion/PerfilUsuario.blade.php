@extends('layouts.postiniciolayout')

@section('title', 'Perfil de Usuario')

@section('content')
<div class="min-h-screen bg-gray-50 flex items-start p-8">
    <div class="w-full max-w-7xl bg-white p-8 rounded-lg shadow-lg relative">

        <!-- Encabezado del Perfil -->
        <div class="content-encabezado mb-8 flex justify-between items-center">
            <h1 class="text-4xl font-bold text-black">Perfil de Usuario</h1>
            <div class="relative">
                <button id="optionsButton" class="text-gray-500 text-xl">
                    <ion-icon name="ellipsis-horizontal-outline"></ion-icon>
                </button>
                <div id="optionsMenu" class="absolute right-0 mt-2 w-48 bg-gray-200 rounded-lg shadow-lg hidden">
                    <ul class="text-center">
<<<<<<< HEAD
                        @if($usuario->id === Auth::id())
                            <li class="border-b border-gray-300 py-2 cursor-pointer hover:bg-gray-300">
                                <a href="{{ route('Configuracion') }}" class="w-full block px-4 py-2 text-left">Configurar
                                    Cuenta</a>
                            </li>
                            <li class="border-b border-gray-300 py-2 cursor-pointer hover:bg-gray-300">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2">Cerrar Sesión</button>
                                </form>
                            </li>
                        @else
                            <li class="border-b border-gray-300 py-2 cursor-pointer hover:bg-gray-300">
                                <a href="{{ route('Configuracion') }}" class="w-full block px-4 py-2 text-left">Reportar</a>
                            </li>
                            <li class="border-b border-gray-300 py-2 cursor-pointer hover:bg-gray-300">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2">Enviar Mensaje</button>
                                </form>
                            </li>
                        @endif
=======
                        <li class="border-b border-gray-300 py-2 hover:bg-gray-300">
                            <a href="{{ route('Configuracion') }}" class="block px-4 py-2">Configurar Cuenta</a>
                        </li>
                        <li class="py-2 hover:bg-gray-300">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2">Cerrar Sesión</button>
                            </form>
                        </li>
>>>>>>> 2a39b17a0767a325119a21d2d8c466aa1e082be2
                    </ul>
                </div>
            </div>
        </div>

        <!-- Información del Usuario -->
        <div class="flex items-start space-x-6 mb-10">
            <div class="w-24 h-24 rounded-full overflow-hidden flex-shrink-0">
                @if ($usuario->profile_photo_path && file_exists(public_path($usuario->profile_photo_path)))
                    <!-- Cargar imagen desde profile_photo_path -->
                    <img class="w-full h-full object-cover" src="{{ asset($usuario->profile_photo_path) }}"
                        alt="Foto de perfil del usuario">
<<<<<<< HEAD
                @elseif ($usuario->avatar)
                    <img class="w-full h-full object-cover" src="{{ $usuario->avatar }}"
=======
                @elseif (Auth::check() && Auth::user()->avatar)
                    <!-- Cargar imagen desde avatar -->
                    <img class="w-full h-full object-cover" src="{{ Auth::user()->avatar }}"
>>>>>>> 2a39b17a0767a325119a21d2d8c466aa1e082be2
                        alt="Foto de perfil del usuario">
                @else
                    <!-- Imagen predeterminada -->
                    <img class="w-full h-full object-cover" src="https://cdn-icons-png.flaticon.com/512/149/149071.png"
                        alt="Foto de perfil predeterminada">
                @endif
            </div>

            <div>
                <h2 class="text-2xl font-bold text-black">{{ $usuario->name }}</h2>
                <p class="text-gray-500">{{ $usuario->estado ?? 'Nada Aun por el momento.' }}</p>
                <p class="text-gray-700 font-semibold">Rol: {{ $usuario->rol }}</p>
            </div>
        </div>

        <!-- Presentación y Biografía -->
        <div class="border-t border-gray-300 pt-6">
            <!-- Presentación -->
            <div class="mb-6">
                <h3 class="text-xl font-semibold mb-4">Presentación</h3>
                <p class="text-gray-700">{{ $usuario->presentacion ?? 'No hay presentación disponible.' }}</p>
            </div>

            <!-- Biografía -->
            <div>
                <h3 class="text-xl font-semibold mb-4">Biografía</h3>
                <p class="text-gray-700">{{ $usuario->biografia ?? 'No hay biografía disponible.' }}</p>
            </div>
        </div>

    </div>
</div>
@endsection
