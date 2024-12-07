<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Cog\Contracts\Ban\Bannable as BannableInterface;
use Cog\Laravel\Ban\Models\Ban;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable implements BannableInterface
{
    use HasRoles;
    use HasApiTokens;
    use Bannable;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'password',
        'estado',
        'rol',
        'biografia',
        'presentacion',
        'profile_photo_path',
        'google_id',
        'avatar',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function publicaciones(){
        return $this->hasMany('App\Models\Publicacion', 'id', 'id');
    }

    protected static function booted()
    {
        static::creating(function ($user) {
            $user->slug = self::generateUniqueSlug($user->name);
        });

        static::updating(function ($user) {
            if ($user->isDirty('name')) {
                $user->slug = self::generateUniqueSlug($user->name);
            }
        });
    }

    public static function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;

        $counter = 1;
        while (self::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }

        return $slug;
    }
}
