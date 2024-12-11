@extends('layouts.layout')

@section('title', 'Inicio')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 p-6 md:p-20">
  <div class="max-w-screen-xl mx-auto px-4">

    <!-- Sección de encabezado -->
    <header class="text-center my-10 md:my-20">
      <h1 class="text-4xl md:text-6xl font-bold text-[#1e3a8a] mb-4">La Web Ideal Para</h1>
      <h1 class="text-4xl md:text-6xl font-extrabold text-[#ff5b02] mb-8">Equipos de Desarrollo</h1>
      <p class="text-gray-600 mb-6 text-lg md:text-xl max-w-5xl mx-auto font-medium">
        DevShare es tu plataforma definitiva para colaborar de manera efectiva. Ofrecemos herramientas intuitivas y
        potentes que impulsan la productividad de tu equipo.
      </p>
      <a href="http://127.0.0.1:8000/login">
        <button class="bg-gray-800 text-white py-2 px-6 rounded hover:bg-gray-700 transition duration-200">
          Comienza Ahora
        </button>
      </a>
    </header>

    <!-- Sección de publicación -->
    <section class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-16 mx-auto mb-8 md:mb-20 max-w-7xl">
      <div class="flex flex-col justify-center items-center md:items-start text-center md:text-left">
        <h2 class="text-4xl md:text-5xl font-semibold text-gray-800 mb-2">La Mejor Manera De</h2>
        <h2 class="text-5xl md:text-7xl font-semibold text-gray-800 mb-3">Publicar</h2>
        <h2 class="text-4xl md:text-5xl font-semibold text-gray-800 mb-4">Tu Conocimiento</h2>
        <p class="text-gray-600 max-w-3xl mb-4">Nuestra plataforma te permite publicar contenido de forma organizada,
          accesible y destinada a personas interesadas en las áreas de especialización.</p>
      </div>
      <div class="flex justify-center md:justify-start">
        <img src="{{ asset('images/feis.jpg') }}" alt="compartir"
          class="rounded-lg shadow-lg w-full md:w-[400px] lg:w-[600px] h-auto object-cover">
      </div>
    </section>

    <!-- Sección de ventajas -->
    <section class="text-center my-10 md:my-20 mx-auto">
      <h3 class="text-3xl md:text-4xl font-semibold text-gray-800 mb-6">Ventajas De Usar DevShare</h3>
      <p class="text-gray-600 mb-8">DevShare es la solución ideal para equipos de desarrollo que buscan mejorar la
        colaboración y la eficiencia.</p>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-10 justify-items-center mx-auto">
        <div class="flex flex-col items-center">
          <img src="{{ asset('images/mano.png') }}" alt="mano"
            class="rounded-lg shadow-lg w-30 h-20 object-cover mx-auto mb-4">
          <p class="text-orange-500 font-semibold">Colaboración Mutua</p>
        </div>
        <div class="flex flex-col items-center">
          <img src="{{ asset('images/compu.png') }}" alt="compu"
            class="rounded-lg shadow-lg w-30 h-20 object-cover mx-auto mb-4">
          <p class="text-orange-500 font-semibold">Acceso Multiplataforma</p>
        </div>
        <div class="flex flex-col items-center">
          <img src="{{ asset('images/tecnico.png') }}" alt="tecnico"
            class="rounded-lg shadow-lg w-30 h-20 object-cover mx-auto mb-4">
          <p class="text-orange-500 font-semibold">Soporte Técnico</p>
        </div>
      </div>

    </section>



    <!-- Sección de funciones con carrusel -->
    <section class="my-20">
      <h3 class="text-2xl font-semibold text-gray-800 mb-8 text-center">Funciones que Ofrece DevShare</h3>
      <div class="relative w-full">
        <!-- Los controles del carrusel -->
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
              <img class="w-full object-cover" src="{{ asset('images/compartir.jpg') }}" alt="Imagen 1">
            </div>
            <div class="w-full flex-shrink-0 flex justify-center items-center">
              <img class="w-full object-cover" src="{{ asset('images/clinux.png') }}" alt="Imagen 2">
            </div>
            <div class="w-full flex-shrink-0 flex justify-center items-center">
              <img class="w-full object-cover" src="{{ asset('images/cphyton.png') }}" alt="Imagen 3">
            </div>
          </div>
        </div>
      </div>

      <script>
        const carousel = document.getElementById('carousel');
        const prevButton = document.getElementById('prevButton');
        const nextButton = document.getElementById('nextButton');

        let index = 0;
        const totalSlides = carousel.children.length;

        function moveCarousel() {
          carousel.style.transform = `translateX(-${index * 100}%)`;
        }

        prevButton.addEventListener('click', () => {
          index = (index > 0) ? index - 1 : totalSlides - 1;
          moveCarousel();
        });

        nextButton.addEventListener('click', () => {
          index = (index < totalSlides - 1) ? index + 1 : 0;
          moveCarousel();
        });
      </script>

    </section>

    <!-- Sección de soporte -->
    <section class="grid grid-cols-1 md:grid-cols-2 items-center gap-8 my-20 mx-8 md:mx-40">
      <div>
        <h3 class="text-2xl font-semibold text-gray-800 mb-4">¿Tienes algunas dudas?</h3>
        <p class="text-gray-600 mb-4">Si tienes alguna duda, accede a nuestra sección de soporte y consulta a los
          expertos.</p>
        <a href="{{ route('Contactanos') }}"
          class="border border-gray-800 text-gray-800 py-2 px-4 rounded hover:bg-gray-800 hover:text-white transition duration-200">Contactar</a>
      </div>
      <div>
        <img src="{{ asset('images/call.jpg') }}" alt="Imagen de callcenter"
          class="rounded-lg shadow-lg w-full h-80 object-cover">
      </div>
    </section>

  </div>
</div>


@endsection