@extends('layouts.layout')

@section('title', 'Inicio')

@section('content')
<div class="min-h-screen flex items-center justify-center p-8">

    <div class="container mx-auto">

      <!-- Sección de encabezado -->
      <header class="text-center my-20">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">La Web Perfecta Para Equipos de Desarrollo</h1>
        <p class="text-gray-600 mb-6">DevShare es tu solución integral para una colaboración activa. Con una interfaz amigable y distintas funcionalidades te ofrecemos un entorno de trabajo eficiente.</p>
        <button class="bg-orange-500 text-white py-2 px-4 rounded hover:bg-orange-600">Comienza Ahora</button>
      </header>

      <!-- Sección de publicación -->
      <section class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
        <div class="text-center md:text-left">
          <h2 class="text-2xl font-semibold text-gray-800">La Mejor Manera De Publicar Tu conocimiento</h2>
          <p class="text-gray-600 my-4">Nuestra plataforma te permite publicar contenido de forma organizada, accesible, y destinado a personas interesadas en las áreas de especialización.</p>
          <button class="border border-orange-500 text-orange-500 py-2 px-4 rounded hover:bg-orange-500 hover:text-white">Explorar Ahora</button>
        </div>
        <div class="bg-gray-300 h-48 md:h-auto"></div>
      </section>

      <!-- Sección de ventajas -->
      <section class="text-center">
        <h3 class="text-2xl font-semibold text-gray-800 mb-8">Ventajas De Usar DevShare</h3>
        <div class="flex flex-col md:flex-row justify-around items-center">
          <div class="flex flex-col items-center mb-8 md:mb-0">
            <img src="icono_colaboracion.svg" alt="Colaboración Mutua" class="w-16 h-16 mb-4">
            <p class="text-orange-500 font-semibold">Colaboración Mutua</p>
          </div>
          <div class="flex flex-col items-center mb-8 md:mb-0">
            <img src="icono_acceso.svg" alt="Acceso Multiplataforma" class="w-16 h-16 mb-4">
            <p class="text-orange-500 font-semibold">Acceso Multiplataforma</p>
          </div>
          <div class="flex flex-col items-center">
            <img src="icono_soporte.svg" alt="Soporte Técnico" class="w-16 h-16 mb-4">
            <p class="text-orange-500 font-semibold">Soporte Técnico</p>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection