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
    </style>
    <title>DevShare - @yield('title')</title>
</head>
<body>
    <div class="sidebar">
        <div class="wrapper">
            <div class="logo">
                <span>
                    <img src="" alt="Logo">
                </span>
            </div>
            <div class="links">
                <button class="link">
                    <ion-icon name="home-outline"></ion-icon>
                    <a href="{{ route('Home') }}">Inicio</a>
                </button>
                <button class="link">
                    <ion-icon name="search-outline"></ion-icon>
                    <a href="#">Búsqueda</a>
                </button>
                <button class="link">
                    <ion-icon name="newspaper-outline"></ion-icon>
                    <a href="{{ route('Noticias') }}">Noticias</a>
                </button>
                <button class="link">
                    <ion-icon name="laptop-outline"></ion-icon>
                    <a href="{{ route('Conferencias') }}">Conferencias</a>
                </button>
                <button class="link">
                    <ion-icon name="paper-plane-outline"></ion-icon>
                    <a href="#">Mensajes</a>
                </button>
                <button class="link">
                    <ion-icon name="create-outline"></ion-icon>
                    <a href="#">Crear</a>
                </button>
                <div class="divider"></div>
                <button class="link">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    <a href="{{ route('PerfilUsuario') }}">Perfil</a>
                </button>
                <button class="link">
                    <ion-icon name="menu-outline"></ion-icon>
                    <a href="#">Menú</a>
                </button>
            </div>
        </div>
    </div>
@yield('content')
</body>
</html>