<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table = 'publicaciones';
    protected $primaryKey = 'id_publicacion';
    protected $fillable = ['id', 'id_categoria', 'titulo', 'descripcion', 'imagen', 'estado'];
    public function users(){
        return $this->belongsTo('App\Models\User', 'id', 'id');
    }
    public function categoria(){
        return $this->belongsTo('App\Models\Categorias', 'id_categoria', 'id_categoria');
    }
    public function comentarios(){
        return $this->hasMany('App\Models\Comentario', 'id_publicacion', 'id_publicacion');
    }
}
