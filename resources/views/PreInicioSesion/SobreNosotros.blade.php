@extends('layouts.layout')

@section('title','Sobre Nosotros')
    
@section('content')
<div class="container mx-auto p-8">

    <!-- Sección de encabezado -->
    <header class="text-center my-12">
      <h1 class="text-4xl font-bold text-gray-800 mb-4">Sobre Nosotros</h1>
      <p class="text-gray-600 mb-6">DevShare es tu solución integral para una colaboración activa. Con una interfaz amigable y distintas funcionalidades te ofrecemos un entorno de trabajo eficiente.</p>
    </header>
  
    <!-- Sección de Misión y Visión -->
    <section class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
      <div class="text-center md:text-left">
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Nuestra Misión</h2>
        <p class="text-gray-600 mb-4">DevShare es la solución integral para una colaboración efectiva. Con una interfaz amigable y distintas funcionalidades te ofrecemos un entorno.</p>
        <img src="imagen_mision.jpg" alt="Imagen Misión" class="rounded-lg shadow-lg w-full h-48 object-cover">
      </div>
      <div class="text-center md:text-left">
        <img src="imagen_vision.jpg" alt="Imagen Visión" class="rounded-lg shadow-lg w-full h-48 object-cover mb-4 md:mb-0">
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Nuestra Visión</h2>
        <p class="text-gray-600">DevShare es la solución integral para una colaboración efectiva. Con una interfaz amigable y distintas funcionalidades te ofrecemos un entorno.</p>
      </div>
    </section>
  
    <!-- Sección de Equipo -->
    <section class="text-center mb-16">
      <h3 class="text-3xl font-bold text-gray-800 mb-10">Nuestro Equipo De Desarrollo</h3>
      <div class="flex flex-wrap justify-center gap-8">
        <!-- Miembro 1 -->
        <div class="text-center">
          <div class="bg-gray-300 rounded-full w-32 h-32 mb-4"></div>
          <p class="text-lg font-semibold">Rodríguez Ordóñez<br>Juan Daniel</p>
          <p class="text-gray-500 text-sm">Administrador General</p>
        </div>
        <!-- Miembro 2 -->
        <div class="text-center">
          <div class="bg-gray-300 rounded-full w-32 h-32 mb-4"></div>
          <p class="text-lg font-semibold">Gonzales Rojas<br>Liam Carlos</p>
          <p class="text-gray-500 text-sm">Administrador General</p>
        </div>
        <!-- Miembro 3 -->
        <div class="text-center">
          <div class="bg-gray-300 rounded-full w-32 h-32 mb-4"></div>
          <p class="text-lg font-semibold">Davila Perez<br>Alessandro Alberto</p>
          <p class="text-gray-500 text-sm">Administrador General</p>
        </div>
      </div>
    </section>
  </div>
@endsection