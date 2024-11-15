@extends('layouts.layout')

@section('title', 'Registrarse')

@section('content')
@session('status')
    <div class="">
        {{ $value }}
    </div>
@endsession
<div class="flex justify-center items-center min-h-screen bg-gray-100 p-4 mt-16">
    <div class="w-full max-w-4xl bg-white rounded-lg shadow-lg p-6 md:p-8 flex flex-col md:flex-row space-y-6 md:space-y-0 md:space-x-8">
        <!-- Sección de bienvenida centrada -->
        <div class="w-full md:w-1/2 bg-yellow-500 text-white p-6 md:p-8 rounded-lg flex flex-col items-center justify-center text-center">
            <h1 class="text-3xl font-bold mb-4">¡Hola!</h1>
            <p class="mb-6">Regístrate con tus datos personales para disfrutar de todo el contenido de nuestra plataforma. Si ya tienes una cuenta registrada, inicia sesión.</p>
            <a href="{{ route('login') }}" class="bg-white text-yellow-500 py-2 px-4 rounded hover:bg-yellow-600 hover:text-white transition">Iniciar Sesión</a>
        </div>

        <!-- Formulario de registro -->
        <div class="w-full md:w-1/2">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Crear Cuenta</h1>

            @session('status')
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ $value }}
            </div>
            @endsession

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block text-gray-700">Nombres</label>
                    <div class="flex items-center border border-gray-300 rounded px-3 py-2">
                        <input id="name" type="text" name="name" class="flex-1 outline-none" required autofocus autocomplete="name">
                        <ion-icon name="person-outline" class="text-gray-500 ml-2"></ion-icon>
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-gray-700">Email</label>
                    <div class="flex items-center border border-gray-300 rounded px-3 py-2">
                        <input id="email" type="email" name="email" class="flex-1 outline-none" required autocomplete="username">
                        <ion-icon name="mail-outline" class="text-gray-500 ml-2"></ion-icon>
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-gray-700">Contraseña</label>
                    <div class="flex items-center border border-gray-300 rounded px-3 py-2">
                        <input id="password" type="password" name="password" class="flex-1 outline-none" required autocomplete="new-password">
                        <ion-icon name="key-outline" class="text-gray-500 ml-2"></ion-icon>
                    </div>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-gray-700">Confirma la Contraseña</label>
                    <div class="flex items-center border border-gray-300 rounded px-3 py-2">
                        <input id="password_confirmation" type="password" name="password_confirmation" class="flex-1 outline-none" required autocomplete="new-password">
                        <ion-icon name="lock-closed-outline" class="text-gray-500 ml-2"></ion-icon>
                    </div>
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="flex items-center mt-4">
                    <input type="checkbox" name="terms" id="terms" class="mr-2 rounded border-gray-300" required>
                    <label for="terms" class="text-sm text-gray-700">
                        {!! __('Acepto los :terms_of_service y la :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-blue-500 underline">Términos de Servicio</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-blue-500 underline">Política de Privacidad</a>',
                        ]) !!}
                    </label>
                </div>
                @endif

                <div class="mt-6">
                    <button type="submit" class="w-full bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600 transition">Registrar</button>
                </div>
                
                <p class="mt-4 text-center text-gray-600">
                    <a href="{{ route('login') }}" class="text-blue-500 underline">¿Ya estás registrado?</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection