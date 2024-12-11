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
          box-sizing: border-box;
          padding: 0;
          margin: 0;
          font-family: "AR One sans", sans-serif;
          font-size: 17px;
      }
      body{
        display: flex;
        flex-direction: column;
      }
      a{
          text-decoration: none;
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

        .footer {
        background-color: #1a1a1a;
        color: white;
        padding: 20px 0;
        }
        .footer-content {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        padding: 0 20px;
        }
        .footer h3 {
        color: white;
        margin-bottom: 15px;
        }
        .footer ul {
        list-style: none;
        padding: 0;
        }
        .footer li {
        margin-bottom: 10px;
        }

        .footer-bottom {
        text-align: center;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid #ff5b02;
        }
        .footer-bottom p {
        margin: 0;
        font-size: 0.9em;
        color: #ffffff;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>DevShare - @yield('title')</title>
    @livewireStyles
</head>
<body>
<header>
    <div>
        <nav x-data="{ open: false }" @keydown.window.escape="open = false" class="bg-[#162d72] w-full z-50 md:fixed">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <!-- Logo y menú desktop -->
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('images/devshare.png') }}" alt="DevShare Logo" class="shadow-lg w-10 h-15">
                        </div>
                        <!-- Menú desktop -->
                        <div class="hidden md:flex ml-20 space-x-4">
                            <a href="{{ route('Bienvenida') }}" class="px-3 py-2 text-white text-sm font-medium hover:bg-gray-700 rounded-md">Bienvenida</a>
                            <a href="{{ route('Contactanos') }}" class="px-3 py-2 text-white text-sm font-medium hover:bg-gray-700 rounded-md">Contáctanos</a>
                            <a href="{{ route('SobreNosotros') }}" class="px-3 py-2 text-white text-sm font-medium hover:bg-gray-700 rounded-md">Sobre Nosotros</a>
                            <a href="{{ route('FAQ') }}" class="px-3 py-2 text-white text-sm font-medium hover:bg-gray-700 rounded-md">FAQ</a>
                        </div>
                    </div>
                    <!-- Menú de usuario y móvil -->
                    <div class="hidden md:flex items-center space-x-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ route('Home') }}" class="text-white px-3 py-2 text-sm font-medium hover:bg-gray-700 rounded-md">Página Principal</a>
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="text-white px-3 py-2 text-sm font-medium hover:bg-gray-700 rounded-md">Cerrar Sesión</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="text-white px-3 py-2 text-sm font-medium hover:bg-gray-700 rounded-md">Iniciar Sesión</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('Registrarse') }}" class="text-white px-3 py-2 text-sm font-medium hover:bg-gray-700 rounded-md">Registrarse</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                    <!-- Botón de menú móvil -->
                    <div class="-mr-2 flex md:hidden">
                        <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Menú móvil -->
            <div :class="{'translate-x-0': open, '-translate-x-full': !open}" class="md:hidden fixed inset-0 transform transition-transform duration-200 ease-in-out bg-[#162d72]">
                <div class="px-2 pt-2 pb-3 space-y-4 h-full">
                    <a href="{{ route('Bienvenida') }}" class="block px-3 py-2 text-white text-lg font-medium hover:bg-gray-700 rounded-md">Inicio</a>
                    <a href="{{ route('Contactanos') }}" class="block px-3 py-2 text-white text-lg font-medium hover:bg-gray-700 rounded-md">Contáctanos</a>
                    <a href="{{ route('SobreNosotros') }}" class="block px-3 py-2 text-white text-lg font-medium hover:bg-gray-700 rounded-md">Sobre Nosotros</a>
                    <a href="{{ route('FAQ') }}" class="block px-3 py-2 text-white text-lg font-medium hover:bg-gray-700 rounded-md">FAQ</a>

                    <div class="mt-4 border-t border-gray-700 pt-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ route('Home') }}" class="block px-3 py-2 text-white text-lg font-medium hover:bg-gray-700 rounded-md">Página Principal</a>
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-3 py-2 text-white text-lg font-medium hover:bg-gray-700 rounded-md">Cerrar Sesión</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="block px-3 py-2 text-white text-lg font-medium hover:bg-gray-700 rounded-md">Iniciar Sesión</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('Registrarse') }}" class="block px-3 py-2 text-white text-lg font-medium hover:bg-gray-700 rounded-md">Registrarse</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>

    @yield('content')
    <footer class="footer">
        <div class="footer-content">
          <div class="footer-left">
            <h3>DevShare</h3>
            <ul>
              <li><a href="{{ route('Bienvenida') }}">Inicio</a></li>
              <li><a href="{{ route('Contactanos') }}">Contactanos</a></li>
              <li><a href="{{ route('SobreNosotros') }}">Sobre Nosotros</a></li>
              <li><a href="{{ route('FAQ') }}">Preguntas Frecuentes</a></li>
            </ul>
          </div>
          <div class="footer-right">
            <ul>
              <li><a href="{{ route('Registrarse') }}">Registrarse</a></li>
              <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
            </ul>
          </div>
        </div>
        <div class="footer-bottom">
          <p>DevShare 2024</p>
        </div>
      </footer>
      @livewireScripts
</body>
</html>
