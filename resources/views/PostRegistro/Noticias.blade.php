@extends('layouts.postiniciolayout')

@section('title', 'Noticias')

@section('content')
<div class="flex-1 p-4 overflow-y-auto h-screen">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-3xl font-bold">Noticias</h1>
        <div class="flex space-x-4">
            <ion-icon name="search-outline" class="text-2xl cursor-pointer"></ion-icon>
            <ion-icon name="funnel-outline" class="text-2xl cursor-pointer"></ion-icon>
        </div>
    </div>
    <!-- Noticia principal -->
    <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden mb-4">
        <div class="flex flex-col md:flex-row">
            <img src="https://emprender.pe/wp-content/uploads/2024/10/Interbank-hacker.jpg" alt="Noticia Principal" class="w-full md:w-1/2 object-cover">
            <div class="p-4 md:w-1/2">
                <h2 class="text-2xl font-bold mb-2">Ciberdelincuentes ponen en peligro información de usuarios tras filtración</h2>
                <p class="text-gray-500 font-semibold mb-2">En Tendencia</p>
                <p class="text-gray-700 mb-4">Interbank ha reconocido que un tercero ha tenido acceso a los datos de sus clientes. El problema que ahora afronta es un hackeo y chantaje cibernético millonario.</p>
                <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Ver Detalles</button>
            </div>
        </div>
    </div>

    <!-- Otras noticias -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden">
            <img src="https://emprender.pe/wp-content/uploads/2024/10/Interbank-hacker.jpg" alt="Noticia 1" class="w-full object-cover">
            <div class="p-4">
                <h3 class="text-xl font-bold mb-2">Base de Datos</h3>
                <p class="text-gray-700 mb-4">Joven eliminó base de datos tras ser despedida injustamente</p>
                <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Ver Detalles</button>
            </div>
        </div>
        <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden">
            <img src="https://emprender.pe/wp-content/uploads/2024/10/Interbank-hacker.jpg" alt="Noticia 2" class="w-full object-cover">
            <div class="p-4">
                <h3 class="text-xl font-bold mb-2">Inteligencia Artificial</h3>
                <p class="text-gray-700 mb-4">Universidad peruana incorpora Inteligencia Artificial en sus clases</p>
                <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Ver Detalles</button>
            </div>
        </div>
        <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden">
            <img src="https://emprender.pe/wp-content/uploads/2024/10/Interbank-hacker.jpg" alt="Noticia 3" class="w-full object-cover">
            <div class="p-4">
                <h3 class="text-xl font-bold mb-2">Desarrollo Web</h3>
                <p class="text-gray-700 mb-4">ProInnóvate otorga 130 becas para programas en Desarrollo Web</p>
                <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Ver Detalles</button>
            </div>
        </div>
        <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden">
            <img src="https://emprender.pe/wp-content/uploads/2024/10/Interbank-hacker.jpg" alt="Noticia 3" class="w-full object-cover">
            <div class="p-4">
                <h3 class="text-xl font-bold mb-2">Desarrollo Web</h3>
                <p class="text-gray-700 mb-4">ProInnóvate otorga 130 becas para programas en Desarrollo Web</p>
                <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Ver Detalles</button>
            </div>
        </div>
        <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden">
            <img src="https://emprender.pe/wp-content/uploads/2024/10/Interbank-hacker.jpg" alt="Noticia 3" class="w-full object-cover">
            <div class="p-4">
                <h3 class="text-xl font-bold mb-2">Desarrollo Web</h3>
                <p class="text-gray-700 mb-4">ProInnóvate otorga 130 becas para programas en Desarrollo Web</p>
                <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Ver Detalles</button>
            </div>
        </div>
        <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden">
            <img src="https://emprender.pe/wp-content/uploads/2024/10/Interbank-hacker.jpg" alt="Noticia 3" class="w-full object-cover">
            <div class="p-4">
                <h3 class="text-xl font-bold mb-2">Desarrollo Web</h3>
                <p class="text-gray-700 mb-4">ProInnóvate otorga 130 becas para programas en Desarrollo Web</p>
                <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Ver Detalles</button>
            </div>
        </div>
    </div>
</div>
@endsection