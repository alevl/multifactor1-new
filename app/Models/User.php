<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'password',
        'telefono',
        'empresa',
        'nivel_id',
        'estatus_id',
        'propietario_id',
        'idioma',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
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

    public function usuario_estatus()
    {
        return $this->belongsTo(EstatusUser::class, 'estatus_id');
    }

    public function usuario_nivel()
    {
        return $this->belongsTo(Nivele::class, 'nivel_id');
    }

    public function usuario_propietario()
    {
        return $this->belongsTo(User::class, 'propietario_id');
    }
}
