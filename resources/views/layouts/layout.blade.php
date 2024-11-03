<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
