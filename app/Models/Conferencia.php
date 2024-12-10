<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Conferencia extends Model
{
    protected $table = 'conferencias';
    protected $primaryKey = 'id_conferencia';
    protected $fillable = ['id_ponente', 'id_categoria', 'titulo', 'descripcion', 'duracion', 'fecha_hora_inicio', 'imagen', 'plataforma', 'URL', 'estado', 'slug'];
    public function categoria(){
        return $this->belongsTo('App\Models\Categorias', 'id_categoria', 'id_categoria');
    }
    public function ponente(){
        return $this->belongsTo('App\Models\Ponente', 'id_ponente', 'id_ponente');
    }
    protected static function booted()
    {
        static::creating(function ($conferencia) {
            $conferencia->slug = self::generateUniqueSlug($conferencia->titulo);
        });

        static::updating(function ($conferencia) {
            if ($conferencia->isDirty('titulo')) {
                $conferencia->slug = self::generateUniqueSlug($conferencia->titulo);
            }
        });
    }

    public static function generateUniqueSlug($titulo)
    {
        $slug = Str::slug($titulo);
        $originalSlug = $slug;

        $counter = 1;
        while (self::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }
        return $slug;
    }
}
