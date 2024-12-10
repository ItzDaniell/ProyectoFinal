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
                                <button id="openReportButton" class="w-full block px-4 py-2 text-left">Reportar</button>
                            </li>
                            <li class="border-b border-gray-300 py-2 cursor-pointer hover:bg-gray-300">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2">Enviar Mensaje</button>
                                </form>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <!-- Información del Usuario -->
        <div class="flex items-start space-x-6 mb-10">
            <div class="w-24 h-24 rounded-full overflow-hidden flex-shrink-0">
                @if ($usuario->profile_photo_path)
                    <img class="w-full h-full object-cover" src="{{ asset($usuario->profile_photo_path) }}"
                        alt="Foto de perfil del usuario">
                @elseif ($usuario->avatar)
                    <img class="w-full h-full object-cover" src="{{ $usuario->avatar }}" alt="Foto de perfil del usuario">
                @else
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

            <div class="flex justify-end mt-10">
                <a href="{{ route('empresa') }}" class="boton">
                    Rol Empresa
                </a>
            </div>

        </div>
    </div>
</div>
<div id="reportModal" class="hidden fixed bg-gray-800 bg-opacity-75 z-50 inset-0 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg">
            <h2 class="text-lg font-semibold mb-4 ">Reportar Usuario</h2>
            <form id="reportForm" method="POST" enctype="multipart/form-data"
                action="{{ route('reportes.store', $usuario->slug)}}">
                @csrf
                <div class="mb-4">
                    <label for="tipo" class="block text-sm font-medium text-gray-700">Razón del Reporte</label>
                    <select type="text" name="tipo" id="tipo" class="w-full border rounded-md p-2" required>
                        <option value="">Seleccione la razón del reporte</option>
                        <option value="Publicaciones Irrelevantes">Publicaciones irrelevantes</option>
                        <option value="Suicidio o Autolesión">Suicidio o autolesión</option>
                        <option value="Violencia, Odio o Explotación">Violencia, odio o explotación</option>
                        <option value="Desnudos o Actividad Sexual">Desnudos o actividad sexual</option>
                        @if ($usuario->rol == 'Empresa')
                            <option value="Estafa, Fraude o Spam">Estafa, fraude o spam</option>
                        @endif
                        <option value="Foto de Perfil Inapropiado">Foto de perfil inapropiado</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="imagen" class="block text-sm font-medium text-gray-700">Subir Imagen (opcional)</label>
                    <input type="file" name="imagen" id="imagen" class="w-full border rounded-md p-2">
                </div>
                <div class="mb-4">
                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="w-full border rounded-md p-2" rows="4"
                        maxlength="2048" required></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="cancelReport"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md mr-2">Cancelar</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@vite('resources/js/mostrar_modal_reporte.js')
@endsection