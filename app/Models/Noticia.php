<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $table = "noticias";
    protected $primaryKey = "id_noticia";
    protected $fillable = ['id_categoria', 'titulo', 'autor', 'descripcion','imagen', 'fuente', 'URL', 'estado'];
    public function categoria(){
        return $this->belongsTo('App\Models\Categorias', 'id_categoria', 'id_categoria');
    }
}
