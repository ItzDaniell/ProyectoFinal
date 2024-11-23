@extends('layouts.layout')

@section('title', 'Iniciar Sesión')

@section('content')

<div class="flex justify-center items-center min-h-screen bg-gray-100 p-4">
    <div
        class="w-full max-w-4xl bg-white rounded-lg shadow-lg p-6 md:p-8 flex flex-col md:flex-row space-y-6 md:space-y-0 md:space-x-8">
        <div
            class="w-full md:w-1/2 bg-yellow-500 text-white p-6 md:p-8 rounded-lg flex flex-col items-center justify-center text-center">
            <h1 class="text-3xl font-bold mb-4">¡Bienvenido!</h1>
            <p class="mb-6">Ingresa tus datos personales para ingresar a la plataforma. Si no tienes registrada una
                cuenta, ¡Hazlo Ahora!</p>
            <a href="{{ route('Registrarse') }}"
                class="bg-white text-yellow-500 py-2 px-4 rounded hover:bg-yellow-600 ">Registrarse</a>
        </div>

        <div class="w-full md:w-1/2">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Iniciar Sesión</h1>

            @session('status')
                <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                    {{ $value }}
                </div>
            @endsession

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-gray-700">Email</label>
                    <div class="flex items-center border border-gray-300 rounded px-3 py-2">
                        <input id="email" type="email" name="email" class="flex-1 outline-none" required autofocus
                            autocomplete="username">
                        <ion-icon name="mail-outline" class="text-gray-500 ml-2"></ion-icon>
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-gray-700">Contraseña</label>
                    <div class="flex items-center border border-gray-300 rounded px-3 py-2">
                        <input id="password" type="password" name="password" class="flex-1 outline-none" required
                            autocomplete="current-password">
                        <ion-icon name="key-outline" class="text-gray-500 ml-2"></ion-icon>
                    </div>
                </div>

                <div class="flex items-center mt-4">
                    <input type="checkbox" id="remember_me" name="remember" class="mr-2 rounded border-gray-300">
                    <label for="remember_me" class="text-sm text-gray-700">Mantener la sesión activa</label>
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="w-full bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600 transition">Iniciar
                        Sesión</button>
                </div>

                @if (Route::has('password.request'))
                 <!--   <p class="mt-4 text-center text-gray-600">
                        <a href="{{ route('OlvidasteContraseña') }}" class="text-blue-500 underline">¿Olvidaste tu
                            Contraseña?</a>
                    </p>  -->
                @endif
            </form>
        </div>
    </div>
</div>
@endsection