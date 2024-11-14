@extends('layouts.layout')

@section('title', 'Olvidaste tu Contrseña')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100 p-4 mt-24">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6">
        <div class="text-center mb-6">
            <p class="text-gray-700">{{ __('¿Olvidaste tu contraseña? Ningún problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un enlace para restablecer su contraseña que le permitirá elegir una nueva.') }}</p>
        </div>

        @session('status')
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ $value }}
            </div>
        @endsession

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-gray-700 mb-1">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" 
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500">
            </div>

            <div>
                <button type="submit" class="w-full bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600 transition">
                    {{ __('Enviar Correo') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection