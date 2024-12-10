<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentarios';
    protected $primaryKey = 'id_comentario';
    protected $fillable = ['id_publicacion', 'id', 'contenido', 'estado'];
    public function publicacion(){
        return $this->belongsTo('App\Models\Publicacion', 'id_publicacion', 'id_publicacion');
    }
    public function users(){
        return $this->belongsTo('App\Models\User', 'id', 'id');
    }
}
