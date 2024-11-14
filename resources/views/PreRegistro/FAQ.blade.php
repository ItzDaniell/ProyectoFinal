@extends('layouts.layout')

@section('title','Preguntas Frecuentes')
    
@section('content')
<div class="container mx-auto p-8">

    <!-- Encabezado de Preguntas Frecuentes -->
    <header class="text-center my-12">
      <h1 class="text-4xl font-bold text-gray-800 mb-4">Preguntas Frecuentes</h1>
      <p class="text-gray-600 mb-6">Aquí encontrarás respuestas a las consultas más comunes sobre nuestra plataforma. Si tienes alguna otra duda, no dudes en contactarnos. Estamos aquí para ayudarte a mejorar tu experiencia colaborativa.</p>
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
        <div class="border-b border-gray-200 py-4 flex justify-between items-center cursor-pointer">
          <span class="text-gray-800 font-semibold">¿Qué es DevShare?</span>
          <span class="text-gray-500 text-xl">+</span>
        </div>
        <!-- Pregunta 2 -->
        <div class="border-b border-gray-200 py-4 flex justify-between items-center cursor-pointer">
          <span class="text-gray-800 font-semibold">¿Qué ofrece DevShare?</span>
          <span class="text-gray-500 text-xl">+</span>
        </div>
        <!-- Pregunta 3 -->
        <div class="border-b border-gray-200 py-4 flex justify-between items-center cursor-pointer">
          <span class="text-gray-800 font-semibold">¿Cómo puedo crear una cuenta en DevShare?</span>
          <span class="text-gray-500 text-xl">+</span>
        </div>
        <!-- Pregunta 4 -->
        <div class="border-b border-gray-200 py-4 flex justify-between items-center cursor-pointer">
          <span class="text-gray-800 font-semibold">¿Cómo reporto un problema con la plataforma?</span>
          <span class="text-gray-500 text-xl">+</span>
        </div>
        <!-- Pregunta 5 -->
        <div class="border-b border-gray-200 py-4 flex justify-between items-center cursor-pointer">
          <span class="text-gray-800 font-semibold">¿Cómo puedo colaborar con otros usuarios en DevShare?</span>
          <span class="text-gray-500 text-xl">+</span>
        </div>
      </div>
    </section>
  
    <!-- Sección de ayuda adicional -->
    <section class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
      <div>
        <h3 class="text-2xl font-semibold text-gray-800 mb-2">¿No Resolviste tus Dudas?</h3>
        <p class="text-gray-600 mb-6">Si tienes alguna otra consulta o necesitas ayuda, no dudes en ponerte en contacto con nuestro equipo de soporte. Estamos aquí para ayudarte.</p>
        <button class="border border-gray-800 text-gray-800 py-2 px-4 rounded hover:bg-gray-800 hover:text-white">Contactar</button>
      </div>
      <div>
        <img src="imagen_contacto.jpg" alt="Imagen de soporte" class="rounded-lg shadow-lg w-full h-48 object-cover">
      </div>
    </section>
  
  </div>
@endsection