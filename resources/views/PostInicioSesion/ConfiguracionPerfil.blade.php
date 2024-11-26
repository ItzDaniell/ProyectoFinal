@extends('layouts.postiniciolayout')

@section('title', 'Configuración')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-50 py-10">
    <div class="w-full max-w-4xl space-y-10">

        <!-- Formulario de Foto de Perfil -->
        <form id="photo-form" action="{{ route('usuario.actualizarFotoPerfil') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-7xl mx-auto">
                <!-- Foto de Perfil -->
                <div class="mb-8 flex items-center justify-between w-full">
                    <div class="flex items-center">
                        <label for="profile_photo" class="cursor-pointer">
                            <img class="w-24 h-24 rounded-full object-cover mr-4 border-2 border-gray-300 hover:border-gray-500 transition"
                                src="{{ Auth::user()->profile_photo_path ? asset('storage/' . Auth::user()->profile_photo_path) : (Auth::user()->avatar ?? 'https://via.placeholder.com/150') }}"
                                alt="Foto de perfil">
                            <input type="file" id="profile_photo" name="profile_photo" class="hidden" accept="image/*"
                                onchange="document.getElementById('photo-form').submit();">
                        </label>
                        <span class="text-xl font-semibold">{{ Auth::user()->name }}</span>
                    </div>
                    <label for="profile_photo" class="boton">Cambiar Foto de Perfil</label>
                </div>
            </div>
        </form>

        <!-- Formulario de Presentación y Biografía -->
        <form action="{{ route('usuario.actualizarPerfil') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-7xl mx-auto">
                <!-- Presentación y Biografía -->
                <div class="flex flex-col w-full space-y-6">
                    <!-- Presentación -->
                    <div class="w-full">
                        <label for="presentacion" class="block text-lg font-bold mb-2">Presentación</label>
                        <input type="text" id="presentacion" name="presentacion"
                            value="{{ old('presentacion', Auth::user()->presentacion ?? '') }}"
                            class="w-full p-4 border-2 border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>

                    <!-- Biografía -->
                    <div class="w-full">
                        <label for="biografia" class="block text-lg font-bold mb-2">Biografía</label>
                        <textarea id="biografia" name="biografia" rows="4"
                            class="w-full p-4 border-2 border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('biografia', Auth::user()->biografia ?? '') }}</textarea>
                    </div>
                </div>

                <!-- Botón de Guardar Cambios -->
                <div class="flex justify-end mt-6">
                    <button type="submit" class="boton">Guardar Cambios</button>
                </div>
            </div>
        </form>

        <!-- Seguridad -->
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <div class="mb-8">
                <h1 class="text-3xl font-bold">Seguridad</h1>
            </div>
            <div>
                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    <div class="mt-6">
                        @livewire('profile.update-password-form')
                    </div>
                @endif
            </div>
        </div>

        <!-- Sesiones Activas -->
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <div class="mb-8">
                <h1 class="text-3xl font-bold">Sesiones Activas</h1>
            </div>
            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>
        </div>

        <!-- Eliminar Cuenta -->
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <div class="mb-8">
                <h1 class="text-3xl font-bold">Eliminar Cuenta</h1>
            </div>
            <div class="mt-10 sm:mt-0">
                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                    @livewire('profile.delete-user-form')
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
