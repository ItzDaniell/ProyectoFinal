@extends('layouts.postiniciolayout')

@section('title', 'Noticias')

@section('content')
<div class="contenedor-noticias">
    <div class="contenedor-encabezado">
        <div class="contenedor-encabezado-titulo">
            <h1>Noticias</h1> 
        </div>
        <div class="opciones">
            <ion-icon name="search-outline"></ion-icon>
            <ion-icon name="funnel-outline"></ion-icon>
        </div>
    </div>
    <div class="noticias">
        <div class="primera-noticia">
            <div class="imagen-primera-noticia">
                <img src="https://gestion.pe/resizer/v2/GQ2TCMBNGEYC2MRSKQZTEORUGU.jpg?auth=5d1389a4d78f592207aaea1d15cf57887ba3e6d8d6bbb61f63823de236109820&width=1200&height=900&quality=75&smart=true" alt="">
            </div>
            <div class="info-primera-noticia">
                <div class="primera-noticia-titulo">
                    <h2>Ciberdelincuentes ponen en peligro información de usuarios tras filtración</h2>
                </div>
                <div class="categoria-primera-noticia">
                    <span>Ciberseguridad</span>
                </div>
                <div class="primera-noticia-descripcion">
                    Interbank ha reconocido que un tercero ha tenido acceso a los datos de sus clientes.
                    El problema que ahora afronta es un hackeo y chantaje cibernético millonario.
                </div>
                <div class="primera-noticia-mas-detalles">

                </div>
            </div>
        </div>
        <div class="mas-noticias">
            <div class="noticia">
                <div class="imagen-noticia">
                    <img src="" alt="">
                </div>
                <div class="categoria-noticia">
                    <span></span>
                </div>
                <div class="noticia-titulo">
                    <h2></h2>
                </div>
                <div class="noticia-mas-detalles">
                    
                </div>
            </div>
        </div>
    </div>
</div>