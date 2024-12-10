<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformeProcesado extends Model
{
    protected $table = 'informes_procesados';
    protected $primaryKey = 'id_informe_procesado';
    protected $fillable = ['id_servicio_tecnico', 'id_informar_problema', 'comentario', 'estado'];
    public function servicio_tecnico(){
        return $this->belongsTo('App\Models\User', 'id_servicio_tecnico', 'id');
    }
    public function informe(){
        return $this->belongsTo('App\Models\InformarProblema', 'id_informar_problema', 'id_informar_problema');
    }
}
