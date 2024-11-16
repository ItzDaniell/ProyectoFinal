@extends('layouts.postiniciolayout')

@section('content')
<h2>Lista de Noticias</h2>
    <a href="">Agregar Noticia</a>
    <table>
        <thead>
            <th>Categoria</th>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th>URL</th>
            <th>Estado</th>
            <th>&nbsp;</th>
        </thead>
        <tbody>
            @foreach ($noticias as $noticia)
            <tr>
                <td>{{ $noticia->categoria->descripcion }}</td>
                <td>{{ $noticia->titulo }}</td>
                <td>{{ $noticia->autor }}</td>
                <td>{{ $noticia->descripcion }}</td>
                <td>{{ $noticia->imagen }}</td>
                <td>{{ $noticia->URL }}</td>
                <td>{{ $noticia->estado }}</td>
            <tr>             
            @endforeach
        </tbody>
    </table>
    {{ $noticias->links() }}
@endsection