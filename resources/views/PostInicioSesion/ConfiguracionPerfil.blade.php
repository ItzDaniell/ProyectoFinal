@extends('layouts.postiniciolayout')

@section('title', 'Configuración')

@section('content')
<div class="sidebar-configuracion">
    <div class="wrapper-configuracion">
        <div class="encabezado">
            <span>Configuración</span>
        </div>
        <div class="links">
            <button class="link">
                <ion-icon name="person-circle-outline"></ion-icon>
                <a href="{{ route('Configuracion') }}">Editar Perfil</a>
            </button>
            <button class="link">
                <ion-icon name="shield-outline"></ion-icon>
                <a href="{{ route('ConfiguracionSeguridad') }}">Seguridad</a>
            </button>
            <button class="link">
                <ion-icon name="laptop-outline"></ion-icon>
                <a href="{{ route('ConfiguracionSesionesActivas') }}">Sesiones Activas</a>
            </button>
            <button class="link">
                <ion-icon name="file-tray-full-outline"></ion-icon>
                <a href="{{ route('Conferencias') }}">Solicitudes Enviadas</a>
            </button>
            <button class="link">
                <ion-icon name="trash-outline"></ion-icon>
                <a href="{{ route('ConfiguracionEliminarCuenta') }}">Eliminar Cuenta</a>
            </button>
            <div class="divider"></div>
            <button class="link">
                <ion-icon name="mail-outline"></ion-icon>
                <a href="{{ route('PerfilUsuario') }}">Solicitar Rol Empresa</a>
            </button>
            <button class="link">
                <ion-icon name="alert-circle-outline"></ion-icon>
                <a href="#">Informar un Problema</a>
            </button>
        </div>
    </div>
</div>
<div class="content">
    <div class="contenedor">
        <div class="content-encabezado">
            <h1>Editar Perfil</h1>
        </div>
        <div class="foto-perfil">
            <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.flaticon.es%2Ficono-gratis%2Fusuario-de-perfil_64572&psig=AOvVaw26m1wPwtvJaOnHChmrNJxs&ust=1731023006641000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCND-nK_xyIkDFQAAAAAdAAAAABAJ" alt="">
            <span>Juan Daniel Rodriguez Ordoñez</span>
            <div class="enlace">
                <a href="" class="boton">Cambiar Foto De Perfil</a>
            </div>
        </div>
        <div class="editarperfil">
        </div>
    </div>
</div>
@endsection