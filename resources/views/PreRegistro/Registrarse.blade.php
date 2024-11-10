@extends('layouts.layout')

@section('title', 'Registrarse')

@section('content')
@session('status')
    <div class="">
        {{ $value }}
    </div>
@endsession
<div class="container-form">
    <div class="container-info">
        <h1>¡Hola!</h1>
        <span>Registrate con tus datos personales para disfrutar de todo el contenido de nuestra plataforma. 
        Si ya tienes una cuenta registrada, inicia sesión.</span>
        <div class="enlace">
            <a href="{{ route('IniciarSesion') }}" class="boton">Iniciar Sesión</a>
        </div>
    </div>
    <div class="form-container">
        <h1>Crear Cuenta</h1>
        @session('status')
            <div class="status-message">
                {{ $value }}
            </div>
        @endsession
        <x-validation-errors class="error-messages mb-4" />

        <form method="POST" action="{{ route('register') }}" class="registration-form">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label">Nombres</label><br>
                <input id="name" class="form-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
                <ion-icon name="person-outline"></ion-icon>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label><br>
                <input id="email" class="form-input" type="email" name="email" :value="old('email')" required autocomplete="username">
                <ion-icon name="mail-outline"></ion-icon>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Contraseña</label><br>
                <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password">
                <ion-icon name="key-outline"></ion-icon>
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirma la Contraseña</label><br>
                <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password">
                <ion-icon name="lock-closed-outline"></ion-icon>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="terms-group">
                    <label for="terms" class="terms-label">
                        <input type="checkbox" name="terms" id="terms" class="terms-checkbox" required>
                        <span class="terms-text">
                            {!! __('Acepto los :terms_of_service y la :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="terms-link">Términos de Servicio</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="terms-link">Política de Privacidad</a>',
                            ]) !!}
                        </span>
                    </label>
                </div>
            @endif

            <div class="form-actions">
                <button type="submit" class="btn-submit">
                    Registrar
                </button><br>
                <a class="login-link" href="{{ route('IniciarSesion') }}">
                    ¿Ya estás registrado?
                </a>
            </div>
        </form>
    </div>
</div>
@endsection