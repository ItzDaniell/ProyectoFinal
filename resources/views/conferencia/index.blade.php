@extends('layouts.postiniciolayout')

@section('content')
<h2>Lista de Conferencias</h2>
    <a href="">Agregar Conferencia</a>
    <table>
        <thead>
            <th>Ponente</th>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Categoria</th>
            <th>Tiempo</th>
            <th>Fecha Inicio</th>
            <th>Imagen</th>
            <th>URL</th>
            <th>Estado</th>
            <th>&nbsp;</th>
        </thead>
        <tbody>
            @foreach ($conferencias as $conferencia)
            <tr>
                <td>{{ $conferencia->pontente->nombres }}</td>
                <td>{{ $conferencia->titulo }}</td>
                <td>{{ $conferencia->descripcion }}</td>
                <td>{{ $conferencia->categoria->descripcion }}</td>
                <td>{{ $conferencia->tiempo }}</td>
                <td>{{ $conferencia->fecha_inicio }}</td>
                <td>{{ $conferencia->imagen }}</td>
                <td>{{ $conferencia->URL }}</td>
                <td>{{ $conferencia->estado }}</td>
            <tr>             
            @endforeach
        </tbody>
    </table>
    {{ $conferencias->links() }}
@endsection