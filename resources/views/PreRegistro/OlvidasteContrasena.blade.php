@extends('layouts.layout')

@section('title', 'Olvidaste tu Contrseña')

@section('content')
<div class="">
    {{ __('¿Olvidaste tu contraseña? Ningún problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un enlace para restablecer su contraseña que le permitirá elegir una nueva.') }}
</div>
@session('status')
    <div class="">
        {{ $value }}
    </div>
@endsession
<x-validation-errors class="mb-4" />
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="">
        <label for="email" value="{{ __('Email') }}">Email</label>
        <input id="email" class="" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
    </div>
    <div class="">
    <button>
        {{ __('Enviar Correo') }}
    </button>
    </div>
</form>

