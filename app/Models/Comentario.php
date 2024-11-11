<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentarios';
    protected $primaryKey = 'id_comentario';
    protected $fillable = ['id_publicacion', 'id_comentarista', 'contenido', 'estado'];
    public function publicacion(){
        return $this->belongsTo('App\Models\Publicacion', 'id_publicacion', 'id_publicacion');
    }
    public function comentarista(){
        return $this->belongsTo('App\Models\Comentarista', 'id_comentarista', 'id_comentarista');
    }
}
