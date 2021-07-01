<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'photo',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relationships
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Scopes
     */
    public function scopeFilterByName(Builder $builder, $name)
    {
        return $builder->when(
            $name,
            function (Builder $builder) use($name) {
                return $builder->where('name', 'like', "%$name%");
            }
        );
    }

    /**
     * Accessors
     */
    public function getPhotoUrlAttribute()
    {
        if (empty($this->photo) || Storage::exists($this->photo)) {
            return 'images/profile.png';
        }

        return Storage::url($this->photo);
    }
}
