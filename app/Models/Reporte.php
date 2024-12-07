<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $table = 'reportes';
    protected $primaryKey = 'id_reporte';
    protected $fillable = ['id', 'id_reportado', 'tipo', 'imagen', 'descripcion', 'estado'];

    public function users(){
        return $this->belongsTo('App\Models\User', 'id', 'id');
    }
    public function reportado(){
        return $this->belongsTo('App\Models\User', 'id_reportado', 'id');
    }
    public function reporte_procesado(){
        return $this->belongsTo('App\Models\ReporteProcesado', 'id_reporte', 'id_reporte');
    }
}
