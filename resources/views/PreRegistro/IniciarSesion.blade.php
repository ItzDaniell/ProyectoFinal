@extends('layouts.layout')

@section('title', 'Iniciar Sesión')

@section('content')
@session('status')
    <div class="">
        {{ $value }}
    </div>
@endsession
    <x-validation-errors class="mb-4" />
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email" value="{{ __('Email') }}">Email</label>
            <input id="email" class="" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
        </div>
        <div class="">
            <label for="password" value="{{ __('Password') }}">Contraseña</label>
            <input id="password" class="" type="password" name="password" required autocomplete="current-password">
        </div>
        <div class="">
            <label for="remember_me" class="">
                <input type="checkbox" id="remember_me" name="remember">
                <span class="">{{ __('Mantener la sesión activa') }}</span>
            </label>
        </div>
        <div class="">
            @if (Route::has('password.request'))
                <a class="" href="{{ route('OlvidasteContraseña') }}">
                    {{ __('¿Olvidaste tu Contraseña?') }}
                </a>
            @endif
            <button class="ms-4">
                {{ __('Iniciar Sesión') }}
            </button>
        </div>
    </form>