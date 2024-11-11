<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentarista extends Model
{
    protected $table = 'comentarista';
    protected $primaryKey = 'id_comentarista';
    protected $fillable = ['nombres', 'email', 'estado'];
    public function comentarios(){
        return $this->hasMany('App\Models\Comentario', 'id_comentario', 'id_comentario');
    }
}
