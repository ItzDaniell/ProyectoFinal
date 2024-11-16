@extends('layouts.postiniciolayout')

@section('content')
<h2>Lista de Usuarios</h2>
    <table>
        <thead>
            <th>Nombre</th>
            <th>Email</th>
            <th>Estado</th>
            <th>Rol</th>
            <th>&nbsp;</th>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->estado }}</td>
                <td>{{ $usuario->rol }}</td>
                <td><a href="">Editar Usuario</a></td>
            <tr>             
            @endforeach
        </tbody>
    </table>
    {{ $usuarios->links() }}
@endsection