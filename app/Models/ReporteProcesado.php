<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReporteProcesado extends Model
{
    protected $table = 'reportes_procesados';
    protected $primaryKey = 'id_reportes_procesados';
    protected $fillable = ['id_moderador', 'id_reporte', 'comentario', 'accion', 'estado'];
    public function moderador(){
        return $this->belongsTo('App\Models\User', 'id_moderador', 'id');
    }
    public function reporte(){
        return $this->belongsTo('App\Models\Reporte', 'id_reporte', 'id_reporte');
    }
}
