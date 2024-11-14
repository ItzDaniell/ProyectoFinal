@extends('layouts.postiniciolayout')

@section('title', 'Configuración de Seguridad')

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
            <h1>Seguridad</h1>
        </div>
        <div class="editarperfil">
            <div>
                <div class="">
                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                        @livewire('profile.update-profile-information-form')
                    @endif
                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        <div class="">
                            @livewire('profile.update-password-form')
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>