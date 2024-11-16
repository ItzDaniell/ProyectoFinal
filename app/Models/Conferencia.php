<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conferencia extends Model
{
    protected $table = 'conferencias';
    protected $primaryKey = 'id_conferencia';
    protected $fillable = ['id_ponente', 'id_categoria', 'titulo', 'descripcion', 'tiempo', 'fecha_inicio', 'imagen', 'URL', 'estado'];
    public function categoria(){
        return $this->belongsTo('App\Models\Categorias', 'id_categoria', 'id_categoria');
    }
    public function pontente(){
        return $this->belongsTo('App\Models\Ponente', 'id_ponente', 'id_ponente');
    }
}
