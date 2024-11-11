<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $table = "categorias";
    protected $primaryKey = "id_categoria";
    protected $fillable = ['descripcion'];
    public function noticias(){
        return $this->hasMany('App\Models\Noticia', 'id_categoria', 'id_categoria');
    }
    public function conferencias(){
        return $this->hasMany('App\Models\Conferencia', 'id_categoria', 'id_categoria');
    }
    public function publicaciones(){
        return $this->hasMany('App\Models\Publicacion', 'id_categoria', 'id_categoria');
    }
}
