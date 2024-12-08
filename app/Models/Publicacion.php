<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Publicacion extends Model
{
    protected $table = 'publicaciones';
    protected $primaryKey = 'id_publicacion';
    protected $fillable = ['id', 'id_categoria', 'titulo', 'descripcion', 'imagen', 'estado', 'slug'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id', 'id');
    }
    public function categoria()
    {
        return $this->belongsTo('App\Models\Categorias', 'id_categoria', 'id_categoria');
    }
    public function comentarios()
    {
        return $this->hasMany('App\Models\Comentario', 'id_publicacion', 'id_publicacion');
    }
    protected static function booted()
    {
        static::creating(function ($publicacion) {
            $publicacion->slug = self::generateUniqueSlug($publicacion->titulo);
        });

        static::updating(function ($publicacion) {
            if ($publicacion->isDirty('titulo')) {
                $publicacion->slug = self::generateUniqueSlug($publicacion->titulo);
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
