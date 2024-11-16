<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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

        .sidebar {
            position: absolute;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background: #0f1010;
            overflow: hidden;
        }

        .sidebar .wrapper {
            width: 250px;
            height: 100%;
        }

        .sidebar .logo {
            padding: 24px 0;
            background: #010102;
            margin-bottom: 20px;
        }

        .sidebar .logo span {
            width: 60px;
            text-align: center;
            display: block;
        }

        .sidebar .links {
            padding: 0 5px;
        }

        .sidebar .link {
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

        .sidebar .link ion-icon {
            display: inline-block;
            width: 22px;
            height: 22px;
            margin-right: 20px;
        }

        .sidebar .link a {
            color: #888;
            flex-grow: 1;
            font-size: inherit;
        }

        .sidebar .divider {
            border-bottom: 1px solid #222;
            margin: 20px 0;
            width: 100%;
        }

        .sidebar .link:hover {
            background: #1f252d;
            color: #fff;
            border-radius: 5px;
        }

        .sidebar .link:hover a {
            color: #fff;
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
        .contenedor .content-encabezado{
            display: flex;
            align-items: center;
            justify-content:left;
            height: 80px;
            padding-left: 20px;
        }
        .content .foto-perfil{
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            width: 750px;
            padding-top: 30px;
        }
        .foto-perfil img{
            width: 100px;
            height: 100px;
        }
        .foto-perfil span{
            font-size: 20px;
            font-weight: bold;
        }
        .boton{
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
        .boton{
            box-shadow: 0px 0px 0 #F3AF31;
        }
        .boton:hover{
            box-shadow: 8px 10px 0 #F3AF31;
        }
        .enlace{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        /*Noticias*/
        .contenedor-noticias{
            position: relative;
            display: grid;
            justify-content: space-around;
            align-content: flex-start;
            top: 0px;
            left: 250px;
            width: calc(100% - 250px);
            height: 100vh;
            overflow: hidden;
            overflow-y: auto;
        }
        .contenedor-encabezado{
            display: flex;
            align-items: center;
            justify-content:space-between;
            max-width:100%;
            height: 80px;
        }
        .contenedor-encabezado .opciones{
            display: flex;
            align-items: center;
            height: 80px;
            padding-right: 20px;
        }
        .opciones ion-icon{
            display: inline-block;
            width: 28px;
            height: 28px;
            margin-left: 20px;
        }
        .noticias{
            display: grid;
            justify-content: center;
        }
        .primera-noticia{
            display: flex;
            width: auto;
            max-width: 800px;
            justify-content: space-between;
        }
        .imagen-primera-noticia img{
            width: auto;
            max-width: 400px;
            height: auto;
            max-height: 300px;

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
                <a href="#" class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                    <ion-icon name="create-outline"></ion-icon>
                    <span>Crear</span>
                </a>
                <div class="border-t border-gray-700 mt-4 pt-4"></div>
                <a href="{{ route('PerfilUsuario') }}" class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
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
                    <div id="dropdownMenu" style="width: 270px;" class="absolute bottom-full mb-2 bg-gray-800 border border-gray-700 p-2 rounded hidden">
                        <ul class="space-y-2">
                            @if(auth()->user()->hasRole('Admin'))
                            <a href="{{ route('noticias.index') }}" class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                                <ion-icon name="settings-outline"></ion-icon>
                                <span>Gestionar Usuarios</span>
                            </a>
                            <a href="{{ route('noticias.index') }}" class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                                <ion-icon name="settings-outline"></ion-icon>
                                <span>Gestionar Publicaciones</span>
                            </a>
                            <a href="{{ route('noticias.index') }}" class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                                <ion-icon name="settings-outline"></ion-icon>
                                <span>Gestionar Comentarios</span>
                            </a>
                            <a href="{{ route('Configuracion') }}" class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                                <ion-icon name="settings-outline"></ion-icon>
                                <span>Gestionar Noticias</span>
                            </a>
                            <a href="{{ route('conferencias.index') }}" class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                                <ion-icon name="settings-outline"></ion-icon>
                                <span>Gestionar Conferencias</span>
                            </a>
                            <a href="{{ route('Configuracion') }}" class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                                <ion-icon name="settings-outline"></ion-icon>
                                <span>Gestionar Reportes</span>
                            </a>
                            <a href="{{ route('Configuracion') }}" class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                                <ion-icon name="settings-outline"></ion-icon>
                                <span>Gestionar Solicitudes</span>
                            </a>
                            <div class="border-t border-gray-700 pt-1 pb-1"></div>
                            @endif
                            <a href="{{ route('Configuracion') }}" class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded">
                                <ion-icon name="settings-outline"></ion-icon>
                                <span>Configuración</span>
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="" class="flex items-center space-x-3 hover:bg-gray-700 p-2 rounded"><button type="submit" class="flex items-center space-x-3 hover:bg-gray-700 rounded">
                                    <ion-icon name="log-out-outline"></ion-icon>
                                    <span>Cerrar Sesión</span>
                                </button></a>
                            </form>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <script>
            function toggleMenu() {
                const menu = document.getElementById('dropdownMenu');
                menu.classList.toggle('hidden');
            }
        </script>
        <div class="flex-1 bg-gray-100 p-4 overflow-y-auto h-screen">
            @yield('content')
        </div>
    </div>
</body>
</html>