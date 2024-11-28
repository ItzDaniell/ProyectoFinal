<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DevShare - <?php echo $__env->yieldContent('title'); ?></title>

    <!-- Estilos -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600;800&display=swap" rel="stylesheet">
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

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


    <!-- Iconos -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="bg-gray-800 text-white w-64 h-screen fixed">
            <div class="flex items-center justify-center h-16 border-b border-gray-700">
                <span class="text-2xl font-semibold">DevShare</span>
            </div>
            <nav class="mt-4 space-y-4 px-4">
                <a href="<?php echo e(route('Home')); ?>" class="flex items-center space-x-3 p-2 rounded hover:bg-gray-700">
                    <ion-icon name="home-outline"></ion-icon>
                    <span>Inicio</span>
                </a>
                <a href="#" class="flex items-center space-x-3 p-2 rounded hover:bg-gray-700">
                    <ion-icon name="search-outline"></ion-icon>
                    <span>Búsqueda</span>
                </a>
                <a href="<?php echo e(route('Noticias')); ?>" class="flex items-center space-x-3 p-2 rounded hover:bg-gray-700">
                    <ion-icon name="newspaper-outline"></ion-icon>
                    <span>Noticias</span>
                </a>
                <a href="<?php echo e(route('Conferencias')); ?>" class="flex items-center space-x-3 p-2 rounded hover:bg-gray-700">
                    <ion-icon name="laptop-outline"></ion-icon>
                    <span>Conferencias</span>
                </a>
                <a href="#" class="flex items-center space-x-3 p-2 rounded hover:bg-gray-700">
                    <ion-icon name="paper-plane-outline"></ion-icon>
                    <span>Mensajes</span>
                </a>
                <div class="border-t border-gray-700 mt-4 pt-4"></div>
                <a href="<?php echo e(route('PerfilUsuario')); ?>"
                    class="flex items-center space-x-3 p-2 rounded hover:bg-gray-700">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    <span>Perfil</span>
                </a>
                <?php if(auth()->user()->hasRole('Admin')): ?>
                    <a href="<?php echo e(route('usuarios.index')); ?>"
                        class="flex items-center space-x-3 p-2 rounded hover:bg-gray-700">
                        <ion-icon name="settings-outline"></ion-icon>
                        <span>Gestionar Usuarios</span>
                    </a>
                <?php endif; ?>
                <form method="POST" action="<?php echo e(route('logout')); ?>" class="mt-4">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="flex items-center space-x-3 w-full p-2 rounded hover:bg-gray-700">
                        <ion-icon name="log-out-outline"></ion-icon>
                        <span>Cerrar Sesión</span>
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Contenido Principal -->
        <main class="flex-1 ml-64 p-4 overflow-y-auto bg-gray-100">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <!-- Scripts -->
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

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
</body>
</html><?php /**PATH C:\Users\davil\OneDrive\Desktop\ProyectoFinal\resources\views/layouts/postiniciolayout.blade.php ENDPATH**/ ?>