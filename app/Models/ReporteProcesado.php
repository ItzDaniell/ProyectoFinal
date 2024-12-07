<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReporteProcesado extends Model
{
    protected $table = 'reportes_procesados';
    protected $primaryKey = 'id_reportes_procesados';
    protected $fillable = ['nombre_moderador', 'id_reporte', 'comentario', 'accion', 'estado'];
    public function users(){
        return $this->belongsTo('App\Models\User', 'id', 'id');
    }
    public function reportado_reporte_procesado(){
        return $this->belongsTo('App\Models\User', 'id_reportado', 'id');
    }
    public function reporte_procesado(){
        return $this->belongsTo('App\Models\Reporte', 'id_reporte', 'id_reporte');
    }
}
