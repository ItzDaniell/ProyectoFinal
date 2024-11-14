@extends('layouts.postiniciolayout')

@section('title', 'Conferencias')

@section('content')
<div class="contenedor-conferencias">
    <div class="contenedor-encabezado">
        <div class="contenedor-encabezado-titulo">
            <h1>Conferencias Virtuales</h1> 
        </div>
        <div class="opciones">
            <ion-icon name="search-outline"></ion-icon>
            <ion-icon name="funnel-outline"></ion-icon>
        </div>
    </div>
    <div class="conferencias">
        <div class="conferencia">
            <div class="conferencia-imagen">
                <img src="https://skillforge.com/wp-content/uploads/2021/01/sql-querying.jpg" alt="">
            </div>
            <div class="conferencia-detalles">
                <div class="conferencia-titulo">
                    <h2>Fundamentos de SQL para Principiantes</h2>
                </div>
                <div class="ponente">
                    <span>Ponente : Juan Daniel Rodriguez Ordoñez</span>
                </div>
                <div class="tiempo">
                    <span>Duracion : 200 minutos</span>
                </div>
                <div class="fecha">
                    <span>Fecha y Hora : 01/01/2006 01:10</span>
                </div>
                <div class="conferencia-mas-detalles">
                    <div class="enlace">
                        <a href="" class="boton">Más Detalles</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="conferencia">
            <div class="conferencia-imagen">
                <img src="https://skillforge.com/wp-content/uploads/2021/01/sql-querying.jpg" alt="">
            </div>
            <div class="conferencia-detalles">
                <div class="conferencia-titulo">
                    <h2>Fundamentos de SQL para Principiantes</h2>
                </div>
                <div class="ponente">
                    <span>Ponente : Juan Daniel Rodriguez Ordoñez</span>
                </div>
                <div class="tiempo">
                    <span>Duracion : 200 minutos</span>
                </div>
                <div class="fecha">
                    <span>Fecha y Hora : 01/01/2006 01:10</span>
                </div>
                <div class="conferencia-mas-detalles">
                    <div class="enlace">
                        <a href="" class="boton">Más Detalles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>