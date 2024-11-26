<?php $__env->startSection('title','Sobre Nosotros'); ?>
    
<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-8">

    <!-- Sección de encabezado -->
    <header class="text-center my-60">
      <h1 class="text-5xl font-extrabold text-gray-800 mb-14">Sobre Nosotros</h1>
      <p class="text-lg text-gray-600 mb-8 max-w-3xl mx-auto">DevShare es tu solución integral para una colaboración activa. Con una interfaz amigable y distintas funcionalidades, te ofrecemos un entorno de trabajo eficiente y colaborativo que se adapta a las necesidades de los equipos de desarrollo.</p>
    </header>
  
    <!-- Sección de Misión y Visión -->
    <section class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-20">
      <div class="text-center md:text-left">
        <h2 class="text-3xl font-semibold text-gray-800 mb-4">Nuestra Misión</h2>
        <p class="text-gray-600 mb-6">DevShare es la solución integral para una colaboración efectiva. Proporcionamos una plataforma donde los equipos pueden interactuar, compartir conocimientos y mejorar sus procesos de desarrollo con facilidad.</p>
        <img src="imagen_mision.jpg" alt="Imagen Misión" class="rounded-lg shadow-lg w-full h-60 object-cover">
      </div>
      <div class="text-center md:text-left">
        <img src="imagen_vision.jpg" alt="Imagen Visión" class="rounded-lg shadow-lg w-full h-60 object-cover mb-6 md:mb-0">
        <h2 class="text-3xl font-semibold text-gray-800 mb-4">Nuestra Visión</h2>
        <p class="text-gray-600">Buscamos ser la plataforma preferida para la colaboración en equipos de desarrollo. Aspiramos a crear un entorno de trabajo donde las ideas fluyan libremente y el aprendizaje sea continuo.</p>
      </div>
    </section>
  
    <!-- Sección de Equipo -->
    <section class="text-center mb-20">
      <h3 class="text-4xl font-extrabold text-gray-800 mb-12">Nuestro Equipo De Desarrollo</h3>
      <div class="flex flex-wrap justify-center gap-12">
        <!-- Miembro 1 -->
        <div class="text-center bg-white p-6 rounded-lg shadow-lg w-72">
          <div class="bg-gray-300 rounded-full w-32 h-32 mx-auto mb-4"></div>
          <p class="text-xl font-semibold text-gray-800">Rodríguez Ordóñez <br><span class="text-lg text-gray-500">Juan Daniel</span></p>
          <p class="text-sm text-gray-500">Administrador General</p>
        </div>
        <!-- Miembro 2 -->
        <div class="text-center bg-white p-6 rounded-lg shadow-lg w-72">
          <div class="bg-gray-300 rounded-full w-32 h-32 mx-auto mb-4"></div>
          <p class="text-xl font-semibold text-gray-800">Gonzales Rojas <br><span class="text-lg text-gray-500">Liam Carlos</span></p>
          <p class="text-sm text-gray-500">Administrador General</p>
        </div>
        <!-- Miembro 3 -->
        <div class="text-center bg-white p-6 rounded-lg shadow-lg w-72">
          <div class="bg-gray-300 rounded-full w-32 h-32 mx-auto mb-4"></div>
          <p class="text-xl font-semibold text-gray-800">Davila Perez <br><span class="text-lg text-gray-500">Alessandro Alberto</span></p>
          <p class="text-sm text-gray-500">Administrador General</p>
        </div>
      </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ItzDaniel\Desktop\PHP\ProyectoFinal\resources\views/PreInicioSesion/SobreNosotros.blade.php ENDPATH**/ ?>