@extends('layouts.layout')

@section('title', 'Sobre Nosotros')

@section('content')
<div class="container mx-auto px-4">

  <!-- Sección de encabezado -->
  <header class="text-center my-20">
    <h1 class="text-4xl sm:text-5xl md:text-8xl font-extrabold text-gray-800 mb-8">Sobre Nosotros</h1>
    <p class="text-lg text-gray-600 mb-8 max-w-3xl mx-auto">DevShare es tu solución integral para una colaboración
      activa. Con una interfaz amigable y distintas funcionalidades, te ofrecemos un entorno de trabajo eficiente y
      colaborativo que se adapta a las necesidades de los equipos de desarrollo.</p>
  </header>

  <!-- Sección de Misión y Visión -->
  <section class="grid grid-cols-1 md:grid-cols-2 gap-16 mx-auto my-8 md:my-20 px-8">
    <!-- Sección Visión -->
    <div class="text-center md:text-left mb-8 mt-12 md:mt-0"> <!-- Aumentamos el espacio superior con mt-12 -->
      <img src="{{ asset('images/vision.jpg') }}" alt="tecnico"
        class="rounded-lg shadow-lg w-full h-80 object-cover mb-8 mx-auto md:mx-0">
      <h2 class="text-3xl md:text-5xl font-semibold text-gray-800 mb-6">Nuestra Visión</h2>
      <p class="text-gray-600">Buscamos ser la plataforma preferida para la colaboración en equipos de desarrollo.
        Aspiramos a crear un entorno de trabajo donde las ideas fluyan libremente y el aprendizaje sea continuo.</p>
    </div>

    <!-- Sección Misión -->
    <div class="text-center md:text-left mb-8 mt-12 md:mt-0"> <!-- Aumentamos el espacio superior con mt-12 -->
      <h2 class="text-3xl md:text-5xl font-semibold text-gray-800 mb-6">Nuestra Misión</h2>
      <p class="text-gray-600 mb-8">DevShare es la solución integral para una colaboración efectiva. Proporcionamos una
        plataforma donde los equipos pueden interactuar, compartir conocimientos y mejorar sus procesos de desarrollo
        con facilidad.</p>
      <img src="{{ asset('images/mision.jpg') }}" alt="tecnico"
        class="rounded-lg shadow-lg w-full h-80 object-cover mb-8 mx-auto md:mx-0">
    </div>
  </section>


  <!-- Sección de Equipo -->
  <section class="text-center mb-20">
    <h3 class="text-4xl sm:text-5xl font-extrabold text-gray-800 mb-12">Nuestro Equipo De Desarrollo</h3>
    <div class="flex flex-wrap justify-center gap-12">
      <!-- Miembro 1 -->
      <div class="text-center bg-white p-6 rounded-lg shadow-lg w-72 mb-8">
        <img src="{{ asset('images/juansin.jpg') }}" alt="Foto de Liam"
          class="rounded-full w-32 h-32 mx-auto mb-4 object-cover">
        <p class="text-xl font-semibold text-gray-800">Rodríguez Ordóñez <br><span class="text-lg text-gray-500">Juan
            Daniel</span></p>
        <p class="text-sm text-gray-500">Administrador General</p>
      </div>
      <!-- Miembro 2 -->
      <div class="text-center bg-white p-6 rounded-lg shadow-lg w-72 mb-8">
        <img src="{{ asset('images/liam.png') }}" alt="Foto de Liam"
          class="rounded-full w-32 h-32 mx-auto mb-4 object-cover">
        <p class="text-xl font-semibold text-gray-800">Gonzales Rojas <br><span class="text-lg text-gray-500">Liam
            Carlos</span></p>
        <p class="text-sm text-gray-500">Administrador General</p>
      </div>
      <!-- Miembro 3 -->
      <div class="text-center bg-white p-6 rounded-lg shadow-lg w-72 mb-8">
        <img src="{{ asset('images/ales.png') }}" alt="Foto de Davila Perez"
          class="rounded-full w-32 h-32 mx-auto mb-4 object-cover">
        <p class="text-xl font-semibold text-gray-800">Davila Perez <br><span class="text-lg text-gray-500">Alessandro
            Alberto</span></p>
        <p class="text-sm text-gray-500">Administrador General</p>
      </div>
    </div>
  </section>
</div>
@endsection