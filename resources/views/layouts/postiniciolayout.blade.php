<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=AR+One+Sans:wght@400..700&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "AR One sans", sans-serif;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .boton {
            width: auto;
            height: auto;
            padding-left: 15px;
            padding-right: 15px;
            padding-top: 10px;
            padding-bottom: 10px;
            color: #ffffff;
            background: #000000;
            font-size: 14px;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.5s;
        }

        .boton {
            box-shadow: 0px 0px 0 #F3AF31;
        }

        .boton:hover {
            box-shadow: 8px 10px 0 #F3AF31;
        }

        .enlace {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>DevShare - @yield('title')</title>
    @vite(['resources/js/vista_previa.js', 'resources/js/mostrar_modal_busq_cat.js'])
</head>
<body>
    <div class="flex flex-col lg:flex-row">
        <!-- Sidebar con ancho fijo -->
        <div class="bg-gray-800 text-white w-64 h-screen p-4">
            <div class="flex items-center justify-center h-16 border-b border-gray-700">
                <span class="text-2xl font-semibold">DevShare</span>
            </div>
            <nav class="space-y-4 mt-4">
                <a href="{{ route('Home') }}" class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                    <ion-icon name="home-outline"></ion-icon>
                    <span>Inicio</span>
                </a>
                <a href="#" class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded" id="openModalBusquedaButton">
                    <ion-icon name="search-outline"></ion-icon>
                    <span>Búsqueda</span>
                </a>
                <a href="{{ route('Noticias') }}" class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                    <ion-icon name="newspaper-outline"></ion-icon>
                    <span>Noticias</span>
                </a>
                <a href="{{ route('Conferencias') }}" class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                    <ion-icon name="laptop-outline"></ion-icon>
                    <span>Conferencias</span>
                </a>
                <a href="#" class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                    <ion-icon name="paper-plane-outline"></ion-icon>
                    <span>Mensajes</span>
                </a>
                <a href="#" class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded" id="openModalCrearButton">
                    <ion-icon name="create-outline"></ion-icon>
                    <span>Crear</span>
                </a>
                <div class="border-t border-gray-700 mt-1 pt-1"></div>
                <a href="{{ route('PerfilUsuario') }}"
                    class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    <span>Perfil</span>
                </a>
                @if(auth()->user()->hasRole('Admin'))
                <a href="{{ route('Administracion') }}"
                    class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                    <ion-icon name="settings-outline"></ion-icon>
                    <span>Administrar</span>
                </a>
                @endif
                <!-- Dropdown button -->
                <div class="relative">
                    <a onclick="toggleMenu()" class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                        <ion-icon name="menu-outline"></ion-icon>
                        <span>Más Opciones</span>
                    </a>
                    <!-- Dropdown menu (posicionado hacia arriba) -->
                    <div id="dropdownMenu" style="width: 270px;"
                        class="absolute bottom-full mb-2 bg-gray-800 border border-gray-700 p-2 rounded hidden">
                        <ul class="space-y-2">
                            <a href="{{ route('Configuracion') }}"
                                class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                                <ion-icon name="settings-outline"></ion-icon>
                                <span>Configuración</span>
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                                        <ion-icon name="log-out-outline"></ion-icon>
                                        <span>Cerrar Sesión</span>
                                </button>
                            </form>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-75 hidden overflow-y-auto z-50">
            <div class="flex items-center justify-center min-h-screen p-4">
                <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-4xl relative">
                    <form action="{{ route('publicacion.store') }}" method="POST" enctype="multipart/form-data"
                        class="mt-4">
                        @csrf
                        <!-- Encabezado -->
                        <div class="flex justify-between items-center pb-4 border-b border-gray-300">
                            <button type="button" id="closeModalCrearButton" class="text-gray-500 hover:text-gray-700">
                                <ion-icon name="arrow-back-outline" size="large"></ion-icon>
                            </button>
                            <h2 class="text-2xl font-bold text-center flex-grow text-gray-800">Crear Nueva Publicación
                            </h2>
                            <button type="submit" class="text-blue-600 font-medium hover:text-blue-800">
                                Publicar
                            </button>
                        </div>
                        <!-- Contenido del modal -->
                        <div class="flex flex-col lg:flex-row space-y-6 lg:space-y-0 lg:space-x-6 mt-6">
                            <!-- Sección de imagen -->
                            <div class="lg:w-1/3 flex-shrink-0">
                                <label for="imageInput" class="block text-gray-700 font-medium mb-2">Imagen</label>
                                <div
                                    class="border border-gray-300 rounded-lg p-4 flex flex-col items-center justify-center h-60 sm:h-72 lg:h-80">
                                    <div class="bg-gray-100 p-6 rounded-lg mb-4">
                                        <ion-icon name="image-outline" class="text-6xl text-gray-400"></ion-icon>
                                    </div>
                                    <input type="file" name="imagen" class="hidden" id="imageInput" accept="image/*" />
                                    <button type="button" onclick="document.getElementById('imageInput').click();"
                                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                                        Seleccionar archivo
                                    </button>
                                    <p id="fileName" class="text-sm text-gray-500 mt-2 text-center">Ningún archivo
                                        seleccionado</p>
                                </div>
                            </div>

                            <!-- Sección de información -->
                            <div class="lg:w-2/3">
                                <label for="titulo" class="block text-gray-700 font-medium mb-2">Título</label>
                                <input type="text" name="titulo" id="titulo"
                                    class="w-full p-3 border border-gray-300 rounded-lg mb-4"
                                    placeholder="Ingresa un título" required>

                                <label for="descripcion"
                                    class="block text-gray-700 font-medium mb-2">Descripción</label>
                                <textarea name="descripcion" id="descripcion" rows="4"
                                    class="w-full p-3 border border-gray-300 rounded-lg mb-4"
                                    placeholder="Ingresa una descripción" required></textarea>

                                <label for="id_categoria" class="block text-gray-700 font-medium mb-2">Categoría</label>
                                <select name="id_categoria" id="id_categoria"
                                    class="w-full p-3 border border-gray-300 rounded-lg mb-4" required>
                                    <option value="">[ SELECCIONE ]</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id_categoria }}">{{ $categoria->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="searchModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden z-50">
            <div class="bg-white w-96 p-6 rounded shadow-lg">
                <div class="flex justify-between items-center border-b pb-2 mb-4">
                    <h2 class="text-xl font-bold">Buscar Personas</h2>
                    <button id="closeModalBusquedaButton" class="text-gray-500 hover:text-gray-800">
                        <ion-icon name="close-outline" size="large"></ion-icon>
                    </button>
                </div>
                <div class="space-y-4">
                    <input id="searchInput" type="text" placeholder="Escribe un nombre..." class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <!-- Resultados de búsqueda -->
                    <div id="searchResults" class="mt-2 space-y-2">
                        <!-- Los resultados del autocompletado se insertarán aquí -->
                    </div>
                </div>
            </div>
        </div>
        {{-- Otros Scripts --}}
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const editarBiografiaButton = document.getElementById('editarBiografiaButton');
                const biografiaText = document.getElementById('biografiaText');
                const biografiaUpdateForm = document.getElementById('biografia-update-form');

                if (editarBiografiaButton) {
                    editarBiografiaButton.addEventListener('click', function () {
                        // Ocultar el texto de la biografía y el botón de actualizar
                        biografiaText.classList.add('hidden');
                        editarBiografiaButton.classList.add('hidden');

                        // Mostrar el formulario de actualización
                        biografiaUpdateForm.classList.remove('hidden');
                    });
                }
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const form = document.querySelector('form'); // Seleccionar el formulario
                form.addEventListener('submit', function (event) {
                    // Prevenir comportamiento por defecto para verificar el envío si es necesario
                    setTimeout(() => {
                        // Limpiar los campos después de un corto retardo
                        document.getElementById('presentacion').value = '';
                        document.getElementById('biografia').value = '';
                    }, 100); // Ajustar el tiempo según sea necesario
                });
            });
        </script>
        <script>
document.getElementById('searchInput').addEventListener('input', function () {
    const query = this.value;

    if (query.length <= 2) {
        document.getElementById('searchResults').innerHTML = '';
        return;
    }

    fetch(`/autocomplete?query=${encodeURIComponent(query)}`)
        .then(response => response.json())
        .then(data => {
            const resultsContainer = document.getElementById('searchResults');
            resultsContainer.innerHTML = '';

            if (data.length === 0) {
                const noResultsMessage = document.createElement('div');
                noResultsMessage.textContent = 'No se encontraron resultados.';
                noResultsMessage.className = 'text-gray-500 text-center p-4';
                resultsContainer.appendChild(noResultsMessage);
                return;
            }

            // Renderizar resultados
            data.forEach(user => {
                const item = document.createElement('div');
                item.className = 'flex items-center space-x-4 p-2 border-b hover:bg-gray-100 cursor-pointer';

                const img = document.createElement('img');
                if (user.profile_photo_path) {
                    img.src = `/storage/${user.profile_photo_path}`;
                } else if (user.avatar) {
                    img.src = user.avatar;
                } else {
                    img.src = "https://cdn-icons-png.flaticon.com/512/149/149071.png";
                }
                img.alt = `${user.name}`;
                img.className = 'w-12 h-12 rounded-full';

                const name = document.createElement('span');
                name.textContent = user.name;
                name.className = 'text-gray-800 font-medium';

                item.appendChild(img);
                item.appendChild(name);

                item.addEventListener('click', () => {
                    document.getElementById('searchInput').value = user.name;
                    resultsContainer.innerHTML = '';
                });

                resultsContainer.appendChild(item);
            });
        })
        .catch(error => {
            console.error('Error fetching autocomplete results:', error);
        });
});
        </script>
        <div class="flex-1 bg-gray-100 p-4 overflow-y-auto h-screen">
            @yield('content')
        </div>
    </div>
    @vite(['resources/js/mostrar_opciones.js', 'resources/js/opciones.js', 'resources/js/mostrar_modal_crear.js', 'resources/js/mostrar_busqueda_nombre.js'])
</body>
</html>