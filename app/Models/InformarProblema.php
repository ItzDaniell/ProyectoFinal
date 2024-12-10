<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformarProblema extends Model
{
    protected $table = 'informar_problemas';
    protected $primaryKey = 'id_informar_problema';
    protected $fillable = ['id', 'tipo_problema', 'imagen', 'descripcion', 'estado'];

    public function users(){
        return $this->belongsTo('App\Models\User', 'id', 'id');
    }
    public function informe_procesado(){
        return $this->belongsTo('App\Models\InformeProcesado', 'id_informar_problema', 'id_informar_problema');
    }
}
