@extends('layouts.postiniciolayout')

@section('content')
<h2 class="text-2xl font-bold mb-4">Editar Ponente</h2>
<form action="{{ route('ponentes.update', $ponente->id_ponente) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PATCH')

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        <label for="nombres" class="block text-sm font-medium text-gray-700">Nombres</label>
        <input type="text" name="nombres" required value="{{ $ponente->nombres }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
    </div>
    
    <div>
        <label for="correo" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
        <input type="email" name="correo" required value="{{ $ponente->correo }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
    </div>
    
    <div>
        <label for="biografia" class="block text-sm font-medium text-gray-700">Biografía</label>
        <textarea name="biografia" rows="4" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">{{ $ponente->biografia }}</textarea>
    </div>

    <div>
        <label for="foto" class="block text-sm font-medium text-gray-700">Foto</label>
        <input type="file" id="foto" name="foto" accept="image/*" class="mt-1 block w-full h-12 text-sm text-gray-500 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-4" onchange="previewImage(event)">
        <div class="mt-4">
            <img id="preview" src="{{ asset('storage/' . $ponente->foto) }}" alt="Foto del Ponente" class="w-32 h-32 object-cover border border-gray-300 rounded-full">
        </div>
    </div>
    
    <div class="flex space-x-4">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
        <a href="{{ route('ponentes.index') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Regresar</a>
    </div>
</form>
@vite('resources/js/preview_image.js')
@endsection
