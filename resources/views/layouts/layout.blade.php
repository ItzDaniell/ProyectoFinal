<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
@import url('https://fonts.googleapis.com/css2?family=AR+One+Sans:wght@400..700&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');
    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
        font-family: "AR One sans", sans-serif;
        font-size: 17px;
    }
    body {
        background-color: white;
    }
    a{
        text-decoration: none;
    }
    .header{
        background-color: #F3AF31;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        height: 70px;
        padding: 5px 7%;
    }
    .header .logo{
        display: flex;
        cursor: pointer;
        margin-right: auto;
        align-items: center;
    }
    .header .logo img{
        height: 50px;
        width: auto;
        padding-right: 10px;
        transition: all 0.3s;
    }
    .header .logo img:hover{
        transform: scale(1.2);
    }
    .header .logo a{
        color: white;
        vertical-align: auto;
    }
    .nav-links li {
        list-style: none;
    }
    .header .nav-links li{
        display: inline-block;
        padding: 0 15px;
        transition: all 0.3s;
    }
    .nav-links a{
        color: white;
    }
    .header .nav-links li:hover{
        transform: scale(1.1);
    }
    .header .nav-links a:hover{
        color: #212121;
    }
    .link-user button{
        border:none;
        background: white;
        color: #212121;
        padding: 9px 12px;
        border-radius: 15px;
        cursor: pointer;
        transition: all 0.3s ease 0s;
    }
    .link-user button:hover{
        background:#212121;
        color: white;
        transform: scale(1.1);
    }
    .link-user a{
        padding-left: 15px;
    }
    .devshare{
        display: flex;
        flex-direction: column;
        padding-top: 20px;
        justify-content: center;
        align-items: center;
        height: 540px;
    }
    .devshare h1{
        font-size: 60px;
    }
    .devshare p{
        width: 700px;
        padding-top: 50px;
        text-align: center;
        padding-bottom: 50px;
    }
    .presentacion{
        display: flex;
        height: 680px;
    }
    .text{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50%;
    }
    .text h2{
        font-size: 40px;
    }
    .text h1{
        font-size: 64px;
    }
    .presentacion button{
        border:none;
        background: #212121;
        color: white;
        padding: 9px 12px;
        border-radius: 15px;
        cursor: pointer;
    }

    .presentacion-img{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50%;
    }
    .presentacion img{
        width: 400px;
        height: 450px;
    }
    .parrafo{
        padding-top:20px;
        padding-bottom: 20px;
        width: 400px;
    }
    .boton{
        width: 160px;
        height:50px;
        color: #ffffff;
        background: #000000;
        font-size: 18px;
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
    .ventajas{
        display: flex;
        height: 400px;
    }
    </style>
    <title>DevShare - @yield('title')</title>
</head>
<body>
    <header class="header">
        <div class="logo">
            <a href="index.html"><img src="unknown-1.png" alt="DevShare"></a>
            <a href="{{ route('Index') }}">DevShare</a>
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="{{ route('SobreNosotros') }}">Sobre Nosotros</a></li>
                <li><a href="{{ route('Contactanos') }}">Contactanos</a></li>
                <li><a href="{{ route('FAQ') }}">FAQ</a></li>
            </ul>
        </nav>
        <div class="link-user">
            <a href=""><button>Crear Cuenta</button></a>
            <a href=""><button>Iniciar Sesión</button></a>  
        </div>
    </header>

    @yield('content')

    <footer>

    </footer>
</body>
</html>
