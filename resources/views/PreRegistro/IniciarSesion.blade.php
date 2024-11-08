@extends('layouts.layout')

@section('title', 'Iniciar Sesión')

@section('content')
    @session('status')
    |   <div class="">
            {{ $value }}
        </div>
    @endsession
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email" value="{{ __('Email') }}">Email</label>
            <input id="email" class="" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
        </div>
        <div class="">
            <label for="password" value="{{ __('Password') }}">Password</label>
            <input id="password" class="" type="password" name="password" required autocomplete="current-password">
        </div>
        <div class="">
            <label for="remember_me" class="">
                <input type="checkbox" id="remember_me" name="remember">
                <span class="">{{ __('Remember me') }}</span>
            </label>
        </div>
        <div class="">
            @if (Route::has('password.request'))
                <a class="" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <button class="ms-4">
                {{ __('Log in') }}
            </button>
        </div>
    </form>