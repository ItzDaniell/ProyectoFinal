<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{

    protected $table = 'inscripciones';
    protected $primaryKey = 'id_inscripcion';
    protected $fillable = ['id_conferencia', 'id', 'estado'];
    public function users(){
        return $this->belongsTo('App\Models\User', 'id', 'id');
    }
    public function conferencia(){
        return $this->belongsTo('App\Models\Conferencia', 'id_conferencia', 'id_conferencia');
    }
}
