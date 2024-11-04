<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/style.css'])
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

    <footer class="footer">
        <div class="footer-content">
          <div class="footer-left">
            <h3>DevShare</h3>
            <ul>
              <li><a href="{{ route('Index') }}">Inicio</a></li>
              <li><a href="{{ route('Contactanos') }}">Contactanos</a></li>
              <li><a href="{{ route('SobreNosotros') }}">Sobre Nosotros</a></li>
              <li><a href="{{ route('FAQ') }}">Preguntas Frecuentes</a></li>
            </ul>
          </div>
          <div class="footer-right">
            <ul>
              <li><a href="#">Crear Cuenta</a></li>
              <li><a href="#">Iniciar Sesión</a></li>
            </ul>
          </div>
        </div>
        <div class="footer-bottom">
          <p>DevShare 2024</p>
        </div>
      </footer>
</body>
</html>
