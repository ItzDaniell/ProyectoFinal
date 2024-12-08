<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ponente extends Model
{
    protected $table = 'ponentes';
    protected $primaryKey = 'id_ponente';
    protected $fillable = ['nombres', 'correo', 'biografia', 'foto', 'slug'];

    public function conferencias()
    {
        return $this->hasMany('App\Models\Conferencia', 'id_ponente', 'id_ponente');
    }

    protected static function booted()
    {
        static::creating(function ($ponente) {
            $ponente->slug = self::generateUniqueSlug($ponente->nombres);
        });

        static::updating(function ($ponente) {
            if ($ponente->isDirty('nombres')) {
                $ponente->slug = self::generateUniqueSlug($ponente->nombres);
            }
        });
    }

    public static function generateUniqueSlug($nombre)
    {
        $slug = Str::slug($nombre);
        $originalSlug = $slug;
        $counter = 1;
        while (self::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }
        return $slug;
    }
}
