<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table = 'publicaciones';
    protected $primaryKey = 'id_publicacion';
    protected $fillable = ['id_usuario', 'id_categoria', 'titulo', 'descripcion', 'imagen', 'estado'];
    public function usuario(){
        return $this->belongsTo('App\Models\User', 'id', 'id_usuario');
    }
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria', 'id_categoria', 'id_categoria');
    }
    public function comentarios(){
        return $this->hasMany('App\Models\Comentario', 'id_publicacion', 'id_publicacion');
    }
}
