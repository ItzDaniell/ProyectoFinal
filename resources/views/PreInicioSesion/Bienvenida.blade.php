@extends('layouts.layout')

@section('title', 'Inicio')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 p-20">
  <div class="max-w-screen-2x20 mx-auto px-4">

    <!-- Sección de encabezado -->
    <header class="text-center my-20"> <!-- Margen superior e inferior ajustado -->
      <h1 class="text-8xl font-bold text-gray-800 mb-4">La Web Perfecta Para</h1>
      <h1 class="text-8xl font-bold text-gray-800 mb-20">Equipos de Desarrollo</h1>
      <p class="text-gray-600 mb-6 text-lg max-w-5xl mx-auto">DevShare es tu solución integral para una colaboración activa. Con una interfaz amigable y distintas funcionalidades te ofrecemos un entorno de trabajo eficiente.</p>
      <button class="bg-orange-500 text-white py-2 px-6 rounded hover:bg-orange-600 transition duration-200">Comienza Ahora</button>
    </header>

    <!-- Sección de publicación -->
    <section class="grid grid-cols-0 md:grid-cols-2 items-center gap-2 md:gap-4 mx-40 my-2">
      <div class="flex flex-col justify-center items-center md:items-start py-2 text-center md:text-left">
        <h2 class="text-6xl font-semibold text-gray-800 mb-1">La Mejor Manera De</h2>
        <h2 class="text-8xl font-semibold text-gray-800 mb-1">Publicar</h2>
        <h2 class="text-6xl font-semibold text-gray-800 mb-3">Tu Conocimiento</h2>
        <p class="text-gray-600 max-w-3xl mb-1">Nuestra plataforma te permite publicar contenido</p>
        <p class="text-gray-600 max-w-3xl mb-1">de forma organizada, accesible, y destinado a personas</p>
        <p class="text-gray-600 max-w-3xl mb-5">interesadas en las áreas de especialización.</p>
      </div>
      <div class="flex justify-start mb-30">
        <img src="{{ asset('images/feis.jpg') }}" alt="compartir" class="rounded-lg shadow-lg w-90 max-w-0xl h-90 object-cover">
      </div>
    </section>

    <!-- Sección de ventajas -->
    <section class="text-left my-20 mx-40">
      <div class="grid grid-cols-1 md:grid-cols-4 gap">
        <div class="flex flex-col items-center">
          <h3 class="text-2xl font-semibold text-gray-800 mb-4">Ventajas De Usar DevShare</h3>
          <p class="text-gray-600">DevShare es la solución ideal para equipos de desarrollo que buscan mejorar la colaboración y la eficiencia.</p>
        </div>
        <div class="flex flex-col items-center">
          <img src="{{ asset('images/mano.png') }}" alt="mano" class="rounded-lg shadow-lg w-30 h-20 object-cover mx-40">
          <p class="text-orange-500 font-semibold">Colaboración Mutua</p>
        </div>
        <div class="flex flex-col items-center">
          <img src="{{ asset('images/compu.png') }}" alt="compu" class="rounded-lg shadow-lg w-30 h-20 object-cover mx-40">
          <p class="text-orange-500 font-semibold">Acceso Multiplataforma</p>
        </div>
        <div class="flex flex-col items-center">
          <img src="{{ asset('images/tecnico.png') }}" alt="tecnico" class="rounded-lg shadow-lg w-30 h-20 object-cover mx-40">
          <p class="text-orange-500 font-semibold">Soporte Técnico</p>
        </div>
      </div>
    </section>

    <!-- Sección de funciones con carrusel -->
    <section class="my-20">
      <h3 class="text-2xl font-semibold text-gray-800 mb-8 text-center">Funciones que Ofrece DevShare</h3>
      <div class="swiper w-full max-w-5xl mx-auto">
        <div class="swiper-wrapper">
          <div class="swiper-slide flex justify-center">
            <img src="/funcion1.jpg" alt="Función 1" class="rounded-lg shadow-md w-full max-w-md">
          </div>
          <div class="swiper-slide flex justify-center">
            <img src="{{ asset('images/.jpg') }}" alt="Imagen de soporte" class="rounded-lg shadow-lg w-full h-120 object-cover">
          </div>
        </div>
        <!-- Botones de navegación -->
        <div class="swiper-button-prev text-gray-500 hover:text-gray-800"></div>
        <div class="swiper-button-next text-gray-500 hover:text-gray-800"></div>
      </div>
    </section>

    <!-- Sección de soporte -->
    <section class="grid grid-cols-1 md:grid-cols-2 items-center gap-8 my-20 mx-40">
      <div>
        <h3 class="text-2xl font-semibold text-gray-800 mb-4">¿Tienes algunas dudas?</h3>
        <p class="text-gray-600 mb-4">Si tienes alguna duda, accede a nuestra sección de soporte y consulta a los expertos.</p>
        <a href="{{ route('Contactanos') }}" class="border border-gray-800 text-gray-800 py-2 px-4 rounded hover:bg-gray-800 hover:text-white">Contactar</a>
      </div>
      <div>
        <img src="{{ asset('images/call.jpg') }}" alt="Imagen de callcenter" class="rounded-lg shadow-lg w-70 h-80 object-cover">
      </div>
    </section>

  </div>
</div>

@endsection