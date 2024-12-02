@extends('layouts.layout')

@section('title', 'Inicio')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 p-20">
  <div class="max-w-screen-2x20 mx-auto px-4">

    <!-- Sección de encabezado -->
    <header class="text-center my-20"> <!-- Margen superior e inferior ajustado -->
      <h1 class="text-7xl font-bold text-gray-800 mb-4">La Web Perfecta Para</h1>
      <h1 class="text-7xl font-bold text-gray-800 mb-20">Equipos de Desarrollo</h1>
      <p class="text-gray-600 mb-6 text-lg max-w-5xl mx-auto">DevShare es tu solución integral para una colaboración activa. Con una interfaz amigable y distintas funcionalidades te ofrecemos un entorno de trabajo eficiente.</p>
      <button class="bg-gray-800 text-white py-2 px-6 rounded hover:bg-gray-800 transition duration-200">Comienza Ahora</button>
    </header>

    <!-- Sección de publicación -->
    <section class="grid grid-cols-0 md:grid-cols-2 items-center gap-2 md:gap-2 mx-40 my-2">
      <div class="flex flex-col justify-center items-center md:items-start py-2 text-center md:text-left">
        <h2 class="text-5xl font-semibold text-gray-800 mb-1">La Mejor Manera De</h2>
        <h2 class="text-7xl font-semibold text-gray-800 mb-1">Publicar</h2>
        <h2 class="text-5xl font-semibold text-gray-800 mb-3">Tu Conocimiento</h2>
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
      <div class="relative w-full">
          <!-- Los controles del carrusel -->
          <!-- Carrusel -->
          <div class="relative w-full">
            <!-- Controles de navegación -->
            <div class="absolute inset-0 flex items-center justify-between px-4 z-10">
              <button class="text-white bg-black bg-opacity-50 p-2 rounded-full" id="prevButton">
                <span class="text-xl">&lt;</span>
              </button>
              <button class="text-white bg-black bg-opacity-50 p-2 rounded-full" id="nextButton">
                <span class="text-xl">&gt;</span>
              </button>
            </div>

            <!-- Las imágenes del carrusel -->
            <div class="overflow-hidden">
              <div class="flex transition-transform duration-500" id="carousel">
                <div class="w-full flex-shrink-0 flex justify-center items-center">
                  <img class="w-200 object-cover" src="{{ asset('images/compartir.jpg') }}" alt="Imagen 1">
                </div>
                <div class="w-full flex-shrink-0 flex justify-center items-center">
                  <img class="w-200 object-cover" src="{{ asset('images/clinux.png') }}" alt="Imagen 2">
                </div>
                <div class="w-full flex-shrink-0 flex justify-center items-center">
                  <img class="w-200 object-cover" src="{{ asset('images/cphyton.png') }}" alt="Imagen 3">
                </div>
              </div>
            </div>
          </div>

          <script>
            // JavaScript para controlar la navegación del carrusel
            const carousel = document.getElementById('carousel');
            const prevButton = document.getElementById('prevButton');
            const nextButton = document.getElementById('nextButton');

            let index = 0;
            const totalSlides = carousel.children.length;

            // Función para mover el carrusel
            function moveCarousel() {
              carousel.style.transform = `translateX(-${index * 100}%)`;
            }

            // Función para mover a la imagen anterior
            prevButton.addEventListener('click', () => {
              index = (index > 0) ? index - 1 : totalSlides - 1;
              moveCarousel();
            });

            // Función para mover a la imagen siguiente
            nextButton.addEventListener('click', () => {
              index = (index < totalSlides - 1) ? index + 1 : 0;
              moveCarousel();
            });
          </script>

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