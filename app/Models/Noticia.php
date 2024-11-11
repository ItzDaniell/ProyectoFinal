<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $table = "noticias";
    protected $primaryKey = "id_noticia";
    protected $fillable = ['id_categoria_noticia', 'titulo', 'autor', 'descripcion', 'imagen', 'URL', 'estado'];
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria_Noticia', 'id_categoria_noticia', 'id_categoria_noticia');
    }
}
