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
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body>
    <div class="flex flex-col lg:flex-row">
        <!-- Sidebar con ancho fijo -->
        <div class="bg-orange-700 text-white w-64 h-screen p-4">
            <div class="flex items-center justify-center h-16 border-b border-white-700">
                <span class="text-2xl font-semibold">DevShare</span>
            </div>
            <nav class="space-y-4 mt-4">
                <a href="{{ route('Home') }}" class="flex items-center space-x-3 hover:bg-zinc-700 p-2 rounded">
                    <ion-icon name="home-outline" class="text-2xl"></ion-icon>
                    <span>Página Principal</span>
                </a>
                <a href="#" class="flex items-center space-x-3 hover:bg-zinc-700 p-2 rounded" id="openModalBusquedaButton">
                    <ion-icon name="search-outline" class="text-2xl"></ion-icon>
                    <span>Búsqueda</span>
                </a>
                <a href="{{ route('Noticias') }}" class="flex items-center space-x-3 hover:bg-zinc-700 p-2 rounded">
                    <ion-icon name="newspaper-outline" class="text-2xl"></ion-icon>
                    <span>Noticias</span>
                </a>
                <a href="{{ route('Conferencias') }}" class="flex items-center space-x-3 hover:bg-zinc-700 p-2 rounded">
                    <ion-icon name="laptop-outline" class="text-2xl"></ion-icon>
                    <span>Conferencias</span>
                </a>
                <a href="{{ url('/chats') }}" class="flex items-center space-x-3 hover:bg-zinc-700 p-2 rounded">
                    <ion-icon name="paper-plane-outline" class="text-2xl"></ion-icon>
                    <span>Mensajes</span>
                </a>
                <a href="#" class="flex items-center space-x-3 hover:bg-zinc-700 p-2 rounded" id="openModalCrearButton">
                    <ion-icon name="create-outline" class="text-2xl"></ion-icon>
                    <span>Crear</span>
                </a>
                <div class="border-t border-white-700 mt-1 pt-1"></div>
                <a href="{{ route('PerfilUsuario') }}"
                    class="flex items-center space-x-3 hover:bg-zinc-700 p-2 rounded">
                    <ion-icon name="person-circle-outline" class="text-2xl"></ion-icon>
                    <span>Perfil</span>
                </a>
                @if(auth()->user()->hasRole('Admin'))
                <a href="{{ route('Administracion') }}"
                    class="flex items-center space-x-3 hover:bg-zinc-700 p-2 rounded">
                    <ion-icon name="settings-outline" class="text-2xl"></ion-icon>
                    <span>Administrar</span>
                </a>
                @endif
                @if(auth()->user()->hasRole('Usuario'))
                <a href="#" id="openModal"
                    class="flex items-center space-x-3 hover:bg-zinc-700 p-2 rounded">
                    <ion-icon name="information-circle-outline" class="text-2xl"></ion-icon>
                    <span>Informar Problema</span>
                </a>
                @endif
                <!-- Dropdown button -->
                <div class="relative cursor-pointer">
                    <a onclick="toggleMenu()" class="flex items-center space-x-3 hover:bg-zinc-700 p-2 rounded">
                        <ion-icon name="menu-outline" class="text-2xl"></ion-icon>
                        <span>Más Opciones</span>
                    </a>
                    <!-- Dropdown menu (posicionado hacia arriba) -->
                    <div id="dropdownMenu" style="width: 270px;"
                        class="absolute bottom-full mb-2 bg-zinc-800 border border-zinc-700 p-2 rounded hidden">
                        <ul class="space-y-2">
                            <a href="{{ route('Configuracion') }}"
                                class="flex items-center space-x-3 hover:bg-zinc-700 p-2 rounded">
                                <ion-icon name="settings-outline" class="text-2xl"></ion-icon>
                                <span>Configuración</span>
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center space-x-3 hover:bg-zinc-700 p-2 rounded">
                                    <ion-icon name="log-out-outline" class="text-2xl"></ion-icon>
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
                        class="mt-2">
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
                                <label for="imageInput" class="block text-gray-700 font-medium mb-2">Archivo</label>
                                <div class="border border-gray-300 rounded-lg p-4 flex flex-col items-center justify-center h-96 sm:h-96 lg:h-96">
                                    <div class="bg-gray-100 p-6 rounded-lg mb-4">
                                        <ion-icon name="image-outline" class="text-6xl text-gray-400"></ion-icon>
                                    </div>
                                    <input type="file" name="archivo" class="hidden" id="imageInput" accept="image/*,application/pdf,.doc,.docx,.rar,.zip" />
                                    <button type="button" onclick="document.getElementById('imageInput').click();" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 w-48">
                                        Seleccionar archivo
                                    </button>
                                    <p id="fileName" class="text-sm text-gray-500 mt-2 text-center truncate max-w-full overflow-hidden text-ellipsis">
                                        Ningún archivo seleccionado
                                    </p>
                                </div>
                            </div>
                            <!-- Sección de información -->
                            <div class="lg:w-2/3">
                                <label for="titulo" class="block text-gray-700 font-medium mb-2">Título</label>
                                <input type="text" name="titulo" id="titulo"
                                    class="w-full p-3 border border-gray-300 rounded-lg mb-2"
                                    placeholder="Ingresa un título" required>

                                <label for="descripcion"
                                    class="block text-gray-700 font-medium mb-2">Descripción</label>
                                <textarea name="descripcion" id="descripcion" rows="4"
                                    class="w-full p-3 border border-gray-300 rounded-lg mb-2"
                                    placeholder="Ingresa una descripción" required></textarea>

                                <label for="id_categoria" class="block text-gray-700 font-medium mb-2">Categoría</label>
                                <select name="id_categoria" id="id_categoria"
                                    class="w-full p-3 border border-gray-300 rounded-lg mb-2" required>
                                    <option value="">[ SELECCIONE ]</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id_categoria }}">{{ $categoria->descripcion }}
                                        </option>
                                    @endforeach
                                </select>

                                <!-- Campo opcional de enlace a proyecto -->
                                <label for="URL" class="block text-gray-700 font-medium mb-2">Enlace al Proyecto
                                    (Opcional)</label>
                                <input type="url" name="URL" id="URL"
                                    class="w-full p-3 border border-gray-300 rounded-lg mb-2"
                                    placeholder="Enlace a tu proyecto">
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
                    <input id="searchInput" type="text" placeholder="Escribe un nombre..."
                        class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <!-- Resultados de búsqueda -->
                    <div id="searchResults" class="mt-2 space-y-2">
                        <!-- Resultados de búsqueda -->
                    </div>
                </div>
            </div>
        </div>
        <div id="problemModal" class="hidden fixed bg-gray-800 bg-opacity-75 z-50 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg">
                    <h2 class="text-lg font-semibold mb-4 ">Informar Problema</h2>
                    <form id="problemForm" method="POST" enctype="multipart/form-data" action="{{ route('informes.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo de problema que presenta</label>
                            <select type="text" name="tipo" id="tipo" class="w-full border rounded-md p-2" required>
                                <option value="">Seleccione el problema</option>
                                <option value="Errores de Carga Lenta">Errores de carga lenta</option>
                                <option value="Enlaces Rotos">Enlaces rotos</option>
                                <option value="Problemas de Compatibilidad entre Navegadores">Problemas de compatibilidad entre navegadores</option>
                                <option value="Errores en Formularios">Errores en formularios</option>
                                <option value="Problemas de Seguridad">Problemas de seguridad</option>
                                <option value="Falta de Accesibilidad">Falta de accesibilidad</option>
                                <option value="Otro problema">Otro problema</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="imagen" class="block text-sm font-medium text-gray-700">Subir Imagen (opcional)</label>
                            <input type="file" name="imagen" id="imagen" class="w-full border rounded-md p-2">
                        </div>
                        <div class="mb-4">
                            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                            <textarea name="descripcion" id="descripcion" class="w-full border rounded-md p-2" rows="4" maxlength="2048" required></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="button" id="cancelProblem" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md mr-2">Cancelar</button>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Enviar</button>
                        </div>
                    </form>
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
            document.addEventListener('DOMContentLoaded', function () {
                const openModalButton = document.getElementById('openModal'); // Botón para abrir el modal
                const modal = document.getElementById('problemModal'); // El modal
                const cancelButton = document.getElementById('cancelProblem'); // Botón para cancelar
                const problemForm = document.getElementById('problemForm'); // Formulario del modal

                // Abrir modal
                openModalButton.addEventListener('click', function () {
                    modal.classList.remove('hidden'); // Muestra el modal
                });

                // Cerrar modal cuando se hace clic en "Cancelar"
                cancelButton.addEventListener('click', function () {
                    modal.classList.add('hidden'); // Oculta el modal
                });

                // Cerrar modal al enviar el formulario
                problemForm.addEventListener('submit', function () {
                    modal.classList.add('hidden'); // Oculta el modal después de enviar
                });
            });
        </script>
        <div class="flex-1 bg-gray-100 p-4 overflow-y-auto h-screen">
            @yield('content')
        </div>
    </div>
    @vite(['resources/js/mostrar_opciones.js', 'resources/js/opciones.js', 'resources/js/mostrar_modal_crear.js', 'resources/js/mostrar_busqueda_nombre.js', 'resources/js/autocomplete.js'])
</body>
</html>
