<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conferencia extends Model
{
    protected $table = 'conferencias';
    protected $primaryKey = 'id_conferencia';
    protected $fillable = ['id_ponente', ];
}
