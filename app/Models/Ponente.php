<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ponente extends Model
{
    protected $table = 'ponentes';
    protected $primaryKey = 'id_ponente';
    protected $fillable = ['nombres', 'email', 'biografia', 'foto', 'estado'];
    public function conferencias(){
        return $this->hasMany('App\Models\Conferencia', 'id_ponente', 'id_ponente');
    }
}