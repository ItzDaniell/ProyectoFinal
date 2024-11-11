<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria_Noticia extends Model
{
    protected $table = "categorias_noticia";
    protected $primaryKey = "id_categoria_noticia";
    protected $fillable = ['descripcion'];
    public function noticias(){
        return $this->hasMany('App\Models\Noticia', 'id_categoria_noticia', 'id_categoria_noticia');
    }
}
