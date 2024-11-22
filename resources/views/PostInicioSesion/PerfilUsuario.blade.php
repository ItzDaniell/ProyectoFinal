@extends('layouts.postiniciolayout')

@section('title', 'Perfil De Usuario')

@section('content')
<div class="flex-1 p-4">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-3xl font-bold">Perfil De Usuario</h1>
        <div class="flex space-x-4 relative">
            <div>
                <div class="mt-4">
                    <img src="" alt="Foto del Ponente" class="hidden w-32 h-32 object-cover border border-gray-300 rounded-full">
                </div>
                <label for="foto" class="block text-sm font-medium text-gray-700">Rodriguez Ordoñez Juan Daniel</label>
            </div>
        </div>
    </div>
</div>
@endsection