@extends('layouts.layout')

@section('title', 'Registrarse')

@section('content')
        <x-validation-errors class="mb-4" />
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <label for="name" value="{{ __('Name') }}">Nombres</label>
                <input id="name" class="" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
            </div>
            <div class="">
                <label for="email" value="{{ __('Email') }}">Email</label>
                <input id="email" class="" type="email" name="email" :value="old('email')" required autocomplete="username">
            </div>
            <div class="">
                <label for="password" value="{{ __('Password') }}"><label>
                <input id="password" class="" type="password" name="password" required autocomplete="new-password">
            </div>
            <div class="mt-4">
                <label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <input id="password_confirmation" class="" type="password" name="password_confirmation" required autocomplete="new-password">
            </div>
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="">
                    <label for="terms">
                        <div class="flex items-center">
                            <input type="checkbox" name="terms" id="terms" required>
                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </label>
                </div>
            @endif
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <button class="ms-4">
                    {{ __('Register') }}
                </button>
            </div>
        </form>

