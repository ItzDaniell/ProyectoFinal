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
            <nav x-data="{ open: false }" @keydown.window.escape="open = false" class="bg-gray-800 w-full z-50 md:fixed">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img src="{{ asset('images/devshare.png') }}" alt="grupo" class=" shadow-lg w-10 h-15">
                            </div>
                            <!-- Menú desktop -->
                            <div class="hidden md:block">
                                <div class="ml-20 flex items-baseline">
                                    <a href="{{ route('Bienvenida') }}" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Inicio</a>
                                    <a href="{{ route('Contactanos') }}" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Contactanos</a>
                                    <a href="{{ route('SobreNosotros') }}" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Sobre Nosotros</a>
                                    <a href="{{ route('FAQ') }}" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">FAQ</a>
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-4 flex items-center md:ml-6">
                                <div @click.away="open = false" class="ml-3 relative" x-data="{ open: false }">
                                    <div>
                                        @if (Route::has('login'))
                                        @auth
                                            <a href="{{ route('Home') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none">
                                                Página Principal
                                            </a>
                                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                                @csrf
                                                <button type="submit" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none">
                                                    Cerrar Sesión
                                                </button>
                                            </form>
                                        @else
                                            <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none">
                                                Iniciar Sesión
                                            </a>
                                            @if (Route::has('register'))
                                                <a href="{{ route('Registrarse') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none">
                                                    Registrarse
                                                </a>
                                            @endif
                                        @endauth
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Botón móvil -->
                        <div class="-mr-2 flex md:hidden">
                            <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Menú móvil modificado -->
                <div
                    :class="{'translate-x-0': open, '-translate-x-full': !open}"
                    class="md:hidden fixed inset-0 transform transition-transform duration-200 ease-in-out bg-gray-800"
                    style="top: 64px;"
                >
                    <div class="px-2 pt-2 pb-3 sm:px-3 h-full flex flex-col">
                        <a href="{{ route('Bienvenida') }}" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Inicio</a>
                        <a href="{{ route('SobreNosotros') }}" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Sobre Nosotros</a>
                        <a href="{{ route('Contactanos') }}" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Contactanos</a>
                        <a href="{{ route('FAQ') }}" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">FAQ</a>

                        <div class="mt-auto border-t border-gray-700 pt-4 pb-3">
                            @if (Route::has('login'))
                            @auth
                                <a href="{{ route('Home') }}" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">
                                    Página Principal
                                </a>
                                <form method="POST" action="{{ route('logout') }}" class="mt-1">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">
                                        Cerrar Sesión
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">
                                    Iniciar Sesión
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('Registrarse') }}" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">
                                        Registrarse
                                    </a>
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
