@extends('layouts.layout')

@section('title','Preguntas Frecuentes')

@section('content')
<div class="container mx-auto p-50">

    <!-- Encabezado de Preguntas Frecuentes -->
    <header class="text-center my-10 flex flex-col items-center justify-center">
        <h1 class="text-6xl font-bold text-gray-1400 mb-20 ">Preguntas Frecuentes</h1>
        <p class="text-gray-600 mb-20 max-w-2xl mx-auto">Aquí encontrarás respuestas a las consultas más comunes sobre nuestra plataforma. Si tienes alguna otra duda, no dudes en contactarnos. Estamos aquí para ayudarte a mejorar tu experiencia colaborativa.</p>
    </header>

    <!-- Sección de Preguntas y Respuestas -->
    <section class="max-w-2xl mx-auto mb-16">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold text-gray-800">Preguntas y Respuestas</h2>
        <button class="text-gray-500 hover:text-gray-700">Contraer / Expandir</button>
      </div>

        <!-- Preguntas -->
        <div class="space-y-4">
            <!-- Pregunta 1 -->
            <div x-data="{ open: false }" class="border-b border-gray-200 py-4 cursor-pointer">
                <div class="flex justify-between items-center" @click="open = !open">
                    <span class="text-gray-800 font-semibold">¿Qué es DevShare?</span>
                    <span class="text-gray-500 text-xl" :class="{'rotate-45': open}">+</span>
                </div>
                <div x-show="open" class="mt-2 text-gray-600">
                    <p>DevShare es una plataforma donde puedes divulgar tus conocimientos y compartirlos con los dem</p>
                </div>
            </div>

            <!-- Pregunta 2 -->
            <div x-data="{ open: false }" class="border-b border-gray-200 py-4 cursor-pointer">
                <div class="flex justify-between items-center" @click="open = !open">
                    <span class="text-gray-800 font-semibold">¿Qué ofrece DevShare?</span>
                    <span class="text-gray-500 text-xl" :class="{'rotate-45': open}">+</span>
                </div>
                <div x-show="open" class="mt-2 text-gray-600">
                    <p>DevShare ofrece una variedad de herramientas...</p>
                </div>
            </div>

            <!-- Pregunta 3 -->
            <div x-data="{ open: false }" class="border-b border-gray-200 py-4 cursor-pointer">
                <div class="flex justify-between items-center" @click="open = !open">
                    <span class="text-gray-800 font-semibold">¿Cómo puedo crear una cuenta en DevShare?</span>
                    <span class="text-gray-500 text-xl" :class="{'rotate-45': open}">+</span>
                </div>
                <div x-show="open" class="mt-2 text-gray-600">
                    <p>Para crear una cuenta, simplemente...</p>
                </div>
            </div>

            <!-- Pregunta 4 -->
            <div x-data="{ open: false }" class="border-b border-gray-200 py-4 cursor-pointer">
                <div class="flex justify-between items-center" @click="open = !open">
                    <span class="text-gray-800 font-semibold">¿Cómo reporto un problema con la plataforma?</span>
                    <span class="text-gray-500 text-xl" :class="{'rotate-45': open}">+</span>
                </div>
                <div x-show="open" class="mt-2 text-gray-600">
                    <p>Para reportar un problema, puedes...</p>
                </div>
            </div>

            <!-- Pregunta 5 -->
            <div x-data="{ open: false }" class="border-b border-gray-200 py-4 cursor-pointer">
                <div class="flex justify-between items-center" @click="open = !open">
                    <span class="text-gray-800 font-semibold">¿Cómo puedo colaborar con otros usuarios en DevShare?</span>
                    <span class="text-gray-500 text-xl" :class="{'rotate-45': open}">+</span>
                </div>
                <div x-show="open" class="mt-2 text-gray-600">
                    <p>La colaboración es fácil. Solo debes...</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de ayuda adicional -->
    <section class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div>
            <h3 class="text-2xl font-semibold text-gray-800 mb-2">¿No Resolviste tus Dudas?</h3>
            <p class="text-gray-600 mb-2">Si tienes alguna otra consulta o necesitas ayuda, no dudes en ponerte en contacto con nuestro equipo de soporte. Estamos aquí para ayudarte.</p>
            <a href="{{ route('Contactanos') }}" class="border border-gray-800 text-gray-800 py-2 px-4 rounded hover:bg-gray-800 hover:text-white">Contactar</a>
        </div>
        <div>
            <img src="{{ asset('images/contactanos.jpg') }}" alt="Imagen de soporte" class="rounded-lg shadow-lg w-full h-120 object-cover">
        </div>
    </section>

</div>
@endsection
