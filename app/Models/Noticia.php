<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Noticia extends Model
{
    protected $table = "noticias";
    protected $primaryKey = "id_noticia";
    protected $fillable = ['id_categoria', 'titulo', 'autor', 'descripcion', 'imagen', 'fuente', 'URL', 'estado', 'slug'];

    public function categoria()
    {
        return $this->belongsTo('App\Models\Categorias', 'id_categoria', 'id_categoria');
    }
    protected static function booted()
    {
        static::creating(function ($noticia) {
            $noticia->slug = self::generateUniqueSlug($noticia->titulo);
        });

        static::updating(function ($noticia) {
            if ($noticia->isDirty('titulo')) {
                $noticia->slug = self::generateUniqueSlug($noticia->titulo);
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
