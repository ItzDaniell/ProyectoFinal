@extends('layouts.postiniciolayout')

@section('content')
<h2>Agregar Noticia</h2>
<form action="{{ route('noticias.store') }}" method="POST" enctype="multipart/form-data">
@csrf
    <label for="titulo">Título</label>
    <input type="text" name="titulo" required><br>
    
    <label for="autor">Autor</label>
    <input type="text" name="autor" required><br>
    
    <label for="descripcion">Descripción</label>
    <textarea name="descripcion" rows="4" required></textarea><br>
    
    <label for="imagen">Imagen</label>
    <input type="file" name="imagen" accept="image/*"><br>
    
    <label for="url">URL</label>
    <input type="url" name="URL"><br>
    
    <label for="categoria">Categoría</label>
    <select name="id_categoria" id="" required>
        <option value="">[ SELECCIONE ]</option>
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id_categoria }}">{{ $categoria->descripcion }}</option>
        @endforeach
    </select><br>
    
    <button type="submit">Enviar</button>
    <button type="reset">Limpiar</button>
</form>
@endsection