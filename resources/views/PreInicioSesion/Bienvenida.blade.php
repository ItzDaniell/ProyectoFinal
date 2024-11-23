@extends('layouts.layout')

@section('title', 'Inicio')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 p-8">
  <div class="max-w-screen-2x20 mx-auto px-4">

    <!-- Sección de encabezado -->
    <header class="text-center my-20">
      <h1 class="text-6xl font-bold text-gray-800 mb-4">La Web Perfecta Para</h1>
      <h1 class="text-6xl font-bold text-gray-800 mb-4">Equipos de Desarrollo</h1>
      <p class="text-gray-600 mb-6 max-w-2xl mx-auto">DevShare es tu solución integral para una colaboración activa. Con una interfaz amigable y distintas funcionalidades te ofrecemos un entorno de trabajo eficiente.</p>
      <button class="bg-orange-500 text-white py-2 px-6 rounded hover:bg-orange-600 transition duration-200">Comienza Ahora</button>
    </header>

    <!-- Sección de publicación -->
    <section class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-10 items-center">
  <div class="flex flex-col justify-center items-center md:items-start py-12 text-center md:text-left">
    <h2 class="text-3xl font-semibold text-gray-800 mb-2">La Mejor Manera De</h2>
    <h2 class="text-6xl font-semibold text-gray-800 mb-2">Publicar</h2>
    <h2 class="text-3xl font-semibold text-gray-800 mb-4">Tu Conocimiento</h2>
    <p class="text-gray-600 max-w-3xl mb-1">Nuestra plataforma te permite publicar contenido</p>
    <p class="text-gray-600 max-w-3xl mb-1">de forma organizada, accesible, y destinado a personas</p>
    <p class="text-gray-600 max-w-3xl mb-4">interesadas en las áreas de especialización.</p>
    <div class="flex justify-center w-full"> <!-- Contenedor para centrar el botón -->
      <button class="border border-orange-500 text-orange-500 px-6 py-2 rounded hover:bg-orange-500 hover:text-white transition duration-">Explorar Ahora</button>
    </div>
  </div>
  <img src="{{ asset('images/compar.jpg') }}" alt="compartir" class="rounded-lg shadow-lg w-90 h-80 object-cover mx-auto">
</section>



    <!-- Sección de ventajas -->
    <section class="text-center mb-16">
      <h3 class="text-2xl font-semibold text-gray-800 mb-8">Ventajas De Usar DevShare</h3>
      <div class="flex flex-col md:flex-row justify-around items-center space-y-8 md:space-y-0 md:space-x-8">
        <div class="flex flex-col items-center">
          <img src="icono_colaboracion.svg" alt="Colaboración Mutua" class="w-16 h-16 mb-4">
          <p class="text-orange-500 font-semibold">Colaboración Mutua</p>
        </div>
        <div class="flex flex-col items-center">
          <img src="icono_acceso.svg" alt="Acceso Multiplataforma" class="w-16 h-16 mb-4">
          <p class="text-orange-500 font-semibold">Acceso Multiplataforma</p>
        </div>
        <div class="flex flex-col items-center">
          <img src="icono_soporte.svg" alt="Soporte Técnico" class="w-16 h-16 mb-4">
          <p class="text-orange-500 font-semibold">Soporte Técnico</p>
        </div>
      </div>
    </section>

    <!-- Sección de funciones con carrusel -->
    <section class="mb-16">
      <h3 class="text-2xl font-semibold text-gray-800 mb-8 text-center">Funciones que Ofrece DevShare</h3>
      <div class="swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="/funcion1.jpg" alt="Función 1" class="rounded-lg shadow-md">
          </div>
          <div class="swiper-slide">
            <img src="/funcion2.jpg" alt="Función 2" class="rounded-lg shadow-md">
          </div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </section>

    <!-- Sección de soporte -->
    <section class="grid grid-cols-1 md:grid-cols-2 items-center gap-8 mb-16">
      <div>
        <h3 class="text-2xl font-semibold text-gray-800 mb-4">¿Tienes algunas dudas?</h3>
        <p class="text-gray-600 mb-4">Si tienes alguna duda, accede a nuestra sección de soporte y consulta a los expertos.</p>
        <button class="bg-orange-500 text-white py-2 px-6 rounded hover:bg-orange-600 transition duration-200">Ir a Soporte</button>
      </div>
      <div>
        <img src="/soporte.jpg" alt="Soporte técnico" class="rounded-lg shadow-md">
      </div>
    </section>

  </div>
</div>

<!-- Pie de página -->
<footer class="bg-gray-800 text-white py-6">
  <div class="container mx-auto text-center">
    <p class="text-sm">&copy; 2024 DevShare. Todos los derechos reservados.</p>
    <div class="mt-4">
      <a href="#" class="text-gray-400 hover:text-white mx-2">Política de Privacidad</a>
      <a href="#" class="text-gray-400 hover:text-white mx-2">Términos de Servicio</a>
      <a href="#" class="text-gray-400 hover:text-white mx-2">Contacto</a>
    </div>
  </div>
</footer>

@endsection
