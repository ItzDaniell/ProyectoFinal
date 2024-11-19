@extends('layouts.postiniciolayout')

@section('content')

@section('title', 'Editar Rol de Usuario')
<h2 class="text-2xl font-bold mb-4">Editar Rol de Usuario</h2>
<form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
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
        <label for="name" class="block text-sm font-medium text-gray-700">Nombres del Usuario</label>
        <input type="text" name="name" required value="{{ $usuario->name }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
    </div>

    <div>
        <label for="autor" class="block text-sm font-medium text-gray-700">Correo del Usuario</label>
        <input type="text" name="autor" required value="{{ $usuario->email }}" class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1" readonly>
    </div>

    <div>
        <label for="profile_photo_pat" class="block text-sm font-medium text-gray-700">Foto de Perfil</label>
        <div class="mt-4">
            <img id="preview" src="{{ asset('storage/' . $usuario->profile_photo_path) }}" alt="Foto del Usuario" class="w-32 h-32 object-cover border border-gray-300 rounded-full">
        </div>
    </div>

    <div>
        <label for="rol" class="block text-sm font-medium text-gray-700">Rol del Usuario</label>
        <select name="rol" id="rol" required
                class="mt-1 block w-full h-8 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 pl-1">
            @foreach ($roles as $rol)
                <option value="{{ $rol }}" {{ $usuario->hasRole($rol) ? 'selected' : '' }}>
                    {{ ucfirst($rol) }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="flex space-x-4">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
        <button type="reset" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Limpiar</button>
        <a href="{{ route('usuarios.index') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Regresar</a>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = "#";
                preview.classList.add('hidden');
            }
        }
    
        function clearPreview() {
            const preview = document.getElementById('preview');
            preview.src = "#";
            preview.classList.add('hidden');
            document.getElementById('imagen').value = "";
        }
    </script>
</form>
@endsection