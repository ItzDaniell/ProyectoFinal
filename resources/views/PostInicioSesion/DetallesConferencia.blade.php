@extends('layouts.postiniciolayout')

@section('title', 'Detalles de La Conferencia')

@section('content')
    <div class="flex flex-wrap-reverse md:flex-nowrap bg-white shadow-lg rounded-lg p-8 space-y-6 md:space-y-0 md:space-x-6 min-h-[500px]"> <!-- Increased padding and min-height -->
        <div class="w-full md:w-7/10">
            <h2 class="text-2xl font-bold text-gray-800">{{ $conferencia->titulo }}</h2>
            <p class="text-gray-600"><strong>Categoría:</strong> {{ $conferencia->categoria->descripcion }}</p>
            <p class="text-gray-600"><strong>Fecha de Publicación:</strong> {{ \Carbon\Carbon::parse($conferencia->fecha_hora_inicio)->subHours(5)->format('d M Y, h:i A') }}</p>
            <p class="mt-4 text-gray-700">
                Descripción de la Conferencia
            </p>
            <p class="mt-4 text-gray-700">
                {{ $conferencia->descripcion }}
            </p>
            <div class="mt-6 flex space-x-4">
                @if (!$yaInscrito) <!-- Solo mostrar el botón si no está inscrito -->
                    <button onclick="openModal()" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                        Inscribirse a la conferencia
                    </button>
                @else
                    <p class="text-green-500 font-semibold">¡Ya estás inscrito! Puedes unirte a la conferencia a través del siguiente enlace:</p>
                    <a href="{{ $conferencia->URL }}" target="_blank" class="text-blue-600 underline">
                        Ir al Enlace
                    </a>
                @endif
            </div>
        </div>
        <div class="w-full md:w-3/10 flex flex-col items-center justify-center space-y-6"> <!-- Changed space-x-4 to space-y-6 for vertical spacing -->
            <img src="{{ asset('storage/'.$conferencia->ponente->foto) }}" alt="Foto del ponente" class="w-32 h-32 rounded-full shadow-lg object-cover mb-4" /> <!-- Added mb-4 for margin-bottom -->
            <div class="text-left">
                <p class="text-lg font-semibold text-gray-800">{{ $conferencia->ponente->nombres }}</p>
                <p class="text-gray-600"><strong>Biografía:</strong> {{ $conferencia->ponente->biografia }}</p>
            </div>
        </div>
    </div>

    @if (session('urlConferencia'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mt-4">
            <p>¡Inscripción exitosa! Aquí tienes el enlace para unirte a la conferencia:</p>
            <a href="{{ session('urlConferencia') }}" target="_blank" class="text-blue-600 underline">
                {{ session('urlConferencia') }}
            </a>
        </div>
    @endif
    <div id="modalInscripcion" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
            <!-- Título -->
            <h2 class="text-xl font-bold mb-4 text-center">Inscripción a la Conferencia</h2>
            <!-- Formulario de inscripción -->
            <form action="{{ route('inscripcion.store', $conferencia->slug) }}" method="POST">
                @csrf
                <div class="flex justify-center mb-4">
                    <img src="https://png.pngtree.com/png-clipart/20190925/original/pngtree-vector-question-icon-png-image_4973806.jpg" alt="Inscripción" class="w-24 h-24 object-contain">
                </div>
                <div class="flex justify-center mb-4">
                    <p class="text-lg font-medium">¿Deseas inscribirte a esta conferencia?</p>
                </div>
                <!-- Botones de acción -->
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal()"
                        class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">
                        Inscribirse
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
<script>
    function openModal() {
        document.getElementById('modalInscripcion').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modalInscripcion').classList.add('hidden');
    }
</script>
