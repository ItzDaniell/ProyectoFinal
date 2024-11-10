@extends('layouts.layout')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="container-form">
    <div class="container-info">
        <h1>¡Bienvenido!</h1>
        <span>Ingresa tus datos personales para ingresar a la plataforma,
        si no tienes registrada una cuenta ¡Hazlo Ahora!</span>
        <div class="enlace">
            <a href="{{ route('Registrarse') }}" class="boton">Registrarse</a>
        </div>
    </div>
    <div class="form-container">
        <h1>Iniciar Sesión</h1>
        @session('status')
            <div class="status-message">
                {{ $value }}
            </div>
        @endsession
        <x-validation-errors class="error-messages" />

        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">{{ __('Email') }}</label><br>
                <input id="email" class="form-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                <ion-icon name="mail-outline"></ion-icon>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">{{ __('Contraseña') }}</label><br>
                <input id="password" class="form-input" type="password" name="password" required autocomplete="current-password">
                <ion-icon name="key-outline"></ion-icon>
            </div>

            <div class="form-group remember-me">
                <input type="checkbox" id="remember_me" name="remember" class="remember-checkbox">
                <label for="remember_me" class="remember-label">
                    {{ __('Mantener la sesión activa') }}
                </label>
            </div>

            <div class="form-actions">
                <button class="submit-button">
                    {{ __('Iniciar Sesión') }}
                </button><br>
                @if (Route::has('password.request'))
                    <a class="forgot-password-link" href="{{ route('OlvidasteContraseña') }}">
                        {{ __('¿Olvidaste tu Contraseña?') }}
                    </a>
                @endif
            </div>
        </form>    
    </div>
</div>
@endsection