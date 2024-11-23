<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.0.1/dist/alpine.js" defer></script>
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

        .sidebar-configuracion {
            position: absolute;
            top: 0px;
            left: 250px;
            width: 300px;
            height: 100vh;
            background: #0f1010;
            overflow: hidden;
            border-left: 4px solid #222;
        }

        .sidebar-configuracion .wrapper-configuracion {
            width: 300px;
            height: 100%;
        }

        .sidebar-configuracion .encabezado {
            padding: 20px 0;
            background: transparent;
            margin-bottom: 20px;
        }

        .sidebar-configuracion .encabezado span {
            padding: 0 12px;
            font-size: 22px;
            color: white;
            font-weight: bold;
            display: block;
        }

        .sidebar-configuracion .links {
            padding: 0 5px;
        }

        .sidebar-configuracion .link {
            margin: 8px 0;
            height: 50px;
            color: #888;
            display: flex;
            align-items: center;
            padding: 0 12px;
            border: none;
            background: none;
            text-align: left;
            width: 100%;
            cursor: pointer;
            transition: all 300ms ease-in-out;
            font-size: 17px;
        }

        .sidebar-configuracion .link ion-icon {
            display: inline-block;
            width: 22px;
            height: 22px;
            margin-right: 20px;
        }

        .sidebar-configuracion .link a {
            color: inherit;
            flex-grow: 1;
            text-decoration: none;
        }

        .sidebar-configuracion .divider {
            border-bottom: 1px solid #222;
            margin: 20px 0;
            width: 100%;
        }

        .sidebar-configuracion .link:hover {
            background: #1f252d;
            color: #fff;
            border-radius: 5px;
        }

        .sidebar-configuracion .link:hover a {
            color: #fff;
        }

        .content {
            position: relative;
            display: flex;
            justify-content: space-around;
            top: 0px;
            left: 550px;
            width: calc(100% - 550px);
            overflow: hidden;
        }

        .contenedor .content-encabezado {
            display: flex;
            align-items: center;
            justify-content: left;
            height: 80px;
            padding-left: 20px;
        }

        .content .foto-perfil {
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            width: 750px;
            padding-top: 30px;
        }

        .foto-perfil img {
            width: 100px;
            height: 100px;
        }

        .foto-perfil span {
            font-size: 20px;
            font-weight: bold;
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
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.0.1/dist/alpine.js" defer></script>
    <title>DevShare - @yield('title')</title>
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
                <a href="" class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
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
                <a href="#" class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded" id="openModalButton">
                    <ion-icon name="create-outline"></ion-icon>
                    <span>Crear</span>
                </a>
                <div class="border-t border-gray-700 mt-4 pt-4"></div>
                <a href="{{ route('PerfilUsuario') }}"
                    class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    <span>Perfil</span>
                </a>
                <!-- Dropdown button -->
                <div class="relative">
                    <a onclick="toggleMenu()" class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                        <ion-icon name="menu-outline"></ion-icon>
                        <span>Menú</span>
                    </a>
                    <!-- Dropdown menu (posicionado hacia arriba) -->
                    <div id="dropdownMenu" style="width: 270px;"
                        class="absolute bottom-full mb-2 bg-gray-800 border border-gray-700 p-2 rounded hidden">
                        <ul class="space-y-2">
                            @if(auth()->user()->hasRole('Admin'))
                                <a href="{{ route('usuarios.index') }}"
                                    class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                                    <ion-icon name="settings-outline"></ion-icon>
                                    <span>Gestionar Usuarios</span>
                                </a>
                                <a href="{{ route('publicacion.index') }}"
                                    class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                                    <ion-icon name="settings-outline"></ion-icon>
                                    <span>Gestionar Publicaciones</span>
                                </a>
                                <a href="{{ route('categorias.index') }}"
                                    class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                                    <ion-icon name="settings-outline"></ion-icon>
                                    <span>Gestionar Categorias</span>
                                </a>
                                <a href="{{ route('noticias.index') }}"
                                    class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                                    <ion-icon name="settings-outline"></ion-icon>
                                    <span>Gestionar Noticias</span>
                                </a>
                                <a href="{{ route('conferencias.index') }}"
                                    class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                                    <ion-icon name="settings-outline"></ion-icon>
                                    <span>Gestionar Conferencias</span>
                                </a>
                                <a href="{{ route('Configuracion') }}"
                                    class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                                    <ion-icon name="settings-outline"></ion-icon>
                                    <span>Gestionar Reportes</span>
                                </a>
                                <a href="{{ route('Configuracion') }}"
                                    class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                                    <ion-icon name="settings-outline"></ion-icon>
                                    <span>Gestionar Solicitudes</span>
                                </a>
                                <div class="border-t border-gray-700 pt-1 pb-1"></div>
                            @endif

                            @if(auth()->user()->hasRole('Gestor de Conferencias'))
                                <a href="{{ route('conferencias.index') }}"
                                    class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                                    <ion-icon name="settings-outline"></ion-icon>
                                    <span>Gestionar Conferencias</span>
                                </a>
                                <div class="border-t border-gray-700 pt-1 pb-1"></div>
                            @endif

                            @if(auth()->user()->hasRole('Moderador'))
                                <a href="{{ route('Configuracion') }}"
                                    class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                                    <ion-icon name="settings-outline"></ion-icon>
                                    <span>Gestionar Reportes</span>
                                </a>
                                <a href="{{ route('publicacion.index') }}"
                                    class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                                    <ion-icon name="settings-outline"></ion-icon>
                                    <span>Gestionar Publicaciones</span>
                                </a>
                                <div class="border-t border-gray-700 pt-1 pb-1"></div>
                            @endif

                            @if(auth()->user()->hasRole('Servicio Tecnico'))
                                <a href="{{ route('noticias.index') }}"
                                    class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                                    <ion-icon name="settings-outline"></ion-icon>
                                    <span>Gestionar Noticias</span>
                                </a>
                                <a href="{{ route('Configuracion') }}"
                                    class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                                    <ion-icon name="settings-outline"></ion-icon>
                                    <span>Gestionar Solicitudes</span>
                                </a>
                                <div class="border-t border-gray-700 pt-1 pb-1"></div>
                            @endif

                            <a href="{{ route('Configuracion') }}"
                                class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                                <ion-icon name="settings-outline"></ion-icon>
                                <span>Configuración</span>
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="" class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded"><button
                                        type="submit" class="flex items-center space-x-3 hover:bg-gray-700 rounded">
                                        <ion-icon name="log-out-outline"></ion-icon>
                                        <span>Cerrar Sesión</span>
                                    </button></a>
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
                                    placeholder="Ingresa una descripción"></textarea>

                                <label for="id_categoria" class="block text-gray-700 font-medium mb-2">Categoría</label>
                                <select name="id_categoria" id="id_categoria"
                                    class="w-full p-3 border border-gray-300 rounded-lg mb-4" required>
                                    <option value="">[ SELECCIONE ]</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id_categoria }}">{{ $categoria->descripcion }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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
        <div class="flex-1 bg-gray-100 p-4 overflow-y-auto h-screen">
            @yield('content')
        </div>
    </div>
</body>

</html>