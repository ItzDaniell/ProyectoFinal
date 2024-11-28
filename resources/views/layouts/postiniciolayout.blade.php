<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DevShare - @yield('title')</title>

    <!-- Estilos -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600;800&display=swap" rel="stylesheet">
    @livewireStyles
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

<<<<<<< HEAD
        /* Ajustes para la barra lateral */
        .sidebar-configuracion {
            position: fixed;
            /* Permite que la barra lateral sea fija */
            top: 0;
            left: 0;
            width: 300px;
            height: 100vh;
            /* Ocupa toda la altura de la ventana */
            background: #0f1010;
            border-right: 4px solid #222;
            overflow-y: auto;
            /* Permite desplazamiento si el contenido de la barra es demasiado largo */
        }

        .sidebar-configuracion .encabezado {
            padding: 20px;
            background: transparent;
        }

        .sidebar-configuracion .encabezado span {
            font-size: 22px;
            color: white;
            font-weight: bold;
        }

        .sidebar-configuracion .link {
            height: 50px;
            color: #888;
            display: flex;
            align-items: center;
            padding: 0 12px;
            background: none;
            cursor: pointer;
            font-size: 17px;
            transition: all 300ms ease-in-out;
        }

        .sidebar-configuracion .link:hover {
            background: #1f252d;
            color: #fff;
            border-radius: 5px;
        }

        /* Ajustes para el contenido principal */
        .content {
            margin-left: 300px;
            /* Espacio a la izquierda para evitar solapamiento */
            padding: 20px;
            width: calc(100% - 300px);
            /* Ajusta el ancho del contenido principal */
            min-height: 100vh;
            /* Asegura que el contenido tenga al menos la altura de la ventana */
            background-color: #f7f7f7;
            overflow-y: auto;
            /* Permitir desplazamiento vertical en el contenido */
        }

        /* Estilo para botones */
=======
>>>>>>> 4a1d31f6413cf60c8c13887b873cd66135864b65
        .boton {
            padding: 10px 15px;
            color: #fff;
            background: #000;
            text-align: center;
            border-radius: 5px;
            /* Bordes redondeados */
            transition: 0.5s;
        }

        .boton:hover {
            box-shadow: 8px 10px 0 #F3AF31;
        }
    </style>
<<<<<<< HEAD


    <!-- Iconos -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
=======
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.0.1/dist/alpine.js" defer></script>
    <title>DevShare - @yield('title')</title>
    @vite(['resources/js/vista_previa.js', 'resources/js/mostrar_modal_busq_cat.js'])
>>>>>>> 4a1d31f6413cf60c8c13887b873cd66135864b65
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="bg-gray-800 text-white w-64 h-screen fixed">
            <div class="flex items-center justify-center h-16 border-b border-gray-700">
                <span class="text-2xl font-semibold">DevShare</span>
            </div>
            <nav class="mt-4 space-y-4 px-4">
                <a href="{{ route('Home') }}" class="flex items-center space-x-3 p-2 rounded hover:bg-gray-700">
                    <ion-icon name="home-outline"></ion-icon>
                    <span>Inicio</span>
                </a>
<<<<<<< HEAD
                <a href="#" class="flex items-center space-x-3 p-2 rounded hover:bg-gray-700">
=======
                <a href="#" class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded" id="openModalButton">
>>>>>>> 4a1d31f6413cf60c8c13887b873cd66135864b65
                    <ion-icon name="search-outline"></ion-icon>
                    <span>Búsqueda</span>
                </a>
                <a href="{{ route('Noticias') }}" class="flex items-center space-x-3 p-2 rounded hover:bg-gray-700">
                    <ion-icon name="newspaper-outline"></ion-icon>
                    <span>Noticias</span>
                </a>
                <a href="{{ route('Conferencias') }}" class="flex items-center space-x-3 p-2 rounded hover:bg-gray-700">
                    <ion-icon name="laptop-outline"></ion-icon>
                    <span>Conferencias</span>
                </a>
                <a href="#" class="flex items-center space-x-3 p-2 rounded hover:bg-gray-700">
                    <ion-icon name="paper-plane-outline"></ion-icon>
                    <span>Mensajes</span>
                </a>
<<<<<<< HEAD
                <div class="border-t border-gray-700 mt-4 pt-4"></div>
=======
                <a href="#" class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded" id="openModalButton">
                    <ion-icon name="create-outline"></ion-icon>
                    <span>Crear</span>
                </a>
                <div class="border-t border-gray-700 mt-1 pt-1"></div>
>>>>>>> 4a1d31f6413cf60c8c13887b873cd66135864b65
                <a href="{{ route('PerfilUsuario') }}"
                    class="flex items-center space-x-3 p-2 rounded hover:bg-gray-700">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    <span>Perfil</span>
                </a>
                @if(auth()->user()->hasRole('Admin'))
<<<<<<< HEAD
                    <a href="{{ route('usuarios.index') }}"
                        class="flex items-center space-x-3 p-2 rounded hover:bg-gray-700">
                        <ion-icon name="settings-outline"></ion-icon>
                        <span>Gestionar Usuarios</span>
                    </a>
                @endif
                <form method="POST" action="{{ route('logout') }}" class="mt-4">
                    @csrf
                    <button type="submit" class="flex items-center space-x-3 w-full p-2 rounded hover:bg-gray-700">
                        <ion-icon name="log-out-outline"></ion-icon>
                        <span>Cerrar Sesión</span>
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Contenido Principal -->
        <main class="flex-1 ml-64 p-4 overflow-y-auto bg-gray-100">
            @yield('content')
        </main>
    </div>
=======
                <a href="{{ route('usuarios.index') }}"
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
                            <button type="button" id="closeModalButton" class="text-gray-500 hover:text-gray-700">
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
>>>>>>> 4a1d31f6413cf60c8c13887b873cd66135864b65

    <!-- Scripts -->
    @livewireScripts
    <script>
        const openModalButton = document.getElementById("openModalButton");
        const closeModalButton = document.getElementById("closeModalButton");
        const modal = document.getElementById("modal");
        const imageInput = document.getElementById("imageInput");
        const fileName = document.getElementById("fileName");

        if (openModalButton && closeModalButton && modal) {
            openModalButton.addEventListener("click", (e) => {
                e.preventDefault();
                modal.classList.remove("hidden");
            });

<<<<<<< HEAD
            closeModalButton.addEventListener("click", () => {
                modal.classList.add("hidden");
                fileName.textContent = "Ningún archivo seleccionado";
            });
        }

        if (imageInput) {
            imageInput.addEventListener("change", (e) => {
                fileName.textContent = e.target.files[0]?.name || "Ningún archivo seleccionado";
            });
        }

        function toggleMenu() {
            const menu = document.getElementById('dropdownMenu');
            if (menu) {
                menu.classList.toggle('hidden');
            }
        }

        window.addEventListener("click", (e) => {
            if (e.target === modal) {
                const menu = document.getElementById('dropdownMenu');
                if (menu) {
                    menu.classList.add("hidden");
                }
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            const optionsButton = document.getElementById('optionsButton');
            const optionsMenu = document.getElementById('optionsMenu');

            if (optionsButton && optionsMenu) {
                optionsButton.addEventListener('click', function () {
                    optionsMenu.classList.toggle('hidden');
                });

                document.addEventListener('click', function (event) {
                    if (!optionsButton.contains(event.target) && !optionsMenu.contains(event.target)) {
                        optionsMenu.classList.add('hidden');
                    }
                });
            }
        });
    </script>
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
=======
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
                    <button id="closeModalButton" class="text-gray-500 hover:text-gray-800">
                        <ion-icon name="close-outline" size="large"></ion-icon>
                    </button>
                </div>
                <div class="space-y-4">
                    <input type="text" placeholder="Escribe un nombre..." class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <div>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Buscar
                        </button>
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
        <div class="flex-1 bg-gray-100 p-4 overflow-y-auto h-screen">
            @yield('content')
        </div>
    </div>
    @vite('resources/js/mostrar_opciones.js')
>>>>>>> 4a1d31f6413cf60c8c13887b873cd66135864b65
</body>
</html>