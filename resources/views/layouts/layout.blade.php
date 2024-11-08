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
      /*Barra de Navegación*/
      .header{
        position: sticky;
        top: 0px;
        left: 0px;
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
      /*Titulo de la pagina*/
      .principal{
          display: flex;
          flex-direction: column;
          text-align: center;
          padding-top: 20px;
          justify-content: center;
          align-items: center;
          height: 590px;
      }
      .principal h1{
          font-size: 60px;
      }
      .principal p{
          width: auto;
          max-width: 700px;
          padding-top: 50px;
          text-align: center;
          padding-bottom: 50px;
          margin-left: 20px;
          margin-right: 20px;
      }
      /*Contenedor de Presentacion (cambios)*/ /*Laptop ok,  Pc ?, Celular ?*/
      .seccion{
          display: flex;
          padding-top: 30px;
          padding-bottom: 20px;
          flex-wrap: wrap;

      }
      .texto{
          display: flex;
          justify-content: center;
          align-items: center;
      }
      .texto h2{
          font-size: 40px;
      }
      .texto h1{
          font-size: 64px;
      }
      .seccion-img{
          display: flex;
          justify-content: center;
          align-items: center;
          padding-top: 30px;
      }
      .seccion img{
          width: 400px;
          height: 450px;
          border-radius: 15px;
      }
      .seccion-parrafo{
          padding-top:20px;
          padding-bottom: 30px;
          width: 400px;
      }
      .seccion-img-ns img{
          width: 400px;
          height: 250px;
      }
      .seccion-rev{
          display: flex;
          flex-wrap: wrap-reverse;
          padding-top: 50px;
          padding-bottom: 50px;
      }
      .seccion-equipo{
          display: flex;
          flex-direction: column;
          flex-wrap: wrap;
      }
      .seccion-texto{
          display: flex;
          align-items: center;
      }
      /*Boton animado*/
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
      /*Contenedor del Boton*/
      .enlace{
          display: flex;
          justify-content: center;
          align-items: center;
      }
      /*Contenedor de Ventajas (cambios)*/ /*Laptop ok,  Pc ?, Celular ?*/
      .ventajas-section{
          display: flex;
          padding-top: 50px;
          flex-wrap: wrap;
      }
      .contenedor-ventajas{
          display: flex;
          flex-wrap: wrap;
          justify-content: space-around;
          align-items: center;
          text-align: center;
      }
      .ventaja{
          padding-bottom: 50px;
      }
      /*Carrousel de Funciones*/
      .carrousel{
          display: flex;
          flex-direction: column;
      }
      .carrousel-text{
          width: 30%;
      }
      /*Footer*/
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
      .footer a {
      color: white;
      text-decoration: none;
      transition: color 0.3s ease;
      }
      .footer a:hover {
      color: #F3AF31;
      }
      .footer-bottom {
      text-align: center;
      margin-top: 20px;
      padding-top: 20px;
      border-top: 1px solid #333;
      }
      .footer-bottom p {
      margin: 0;
      font-size: 0.9em;
      color: #666;
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
                @if (Route::has('login'))
                  @auth
                  <li><a href="{{ url('Home') }}">Dashboard</a></li>
                @else
                  <li><a href="{{ route('IniciarSesion') }}">Iniciar Sesión</a></li>
                  @if (Route::has('register'))
                    <li><a href="{{ route('Registrarse') }}">Registrarse</a></li>
                  @endif
                  @endauth
                @endif
            </ul>
        </nav>
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
              <li><a href="{{ route('Registrarse') }}">Registrarse</a></li>
              <li><a href="{{ route('IniciarSesion') }}">Iniciar Sesión</a></li>
            </ul>
          </div>
        </div>
        <div class="footer-bottom">
          <p>DevShare 2024</p>
        </div>
      </footer>
</body>
</html>
