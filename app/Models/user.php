<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'telefono',
        'direccion',
        'ciudad',
        'capacidad',
        'horarios',
        'responsable',
        'servicios',
        'id_rol',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Mutador para cifrar automáticamente la contraseña al asignarla.
     */
    public function setPasswordAttribute($value)
    {
        // Evita volver a hashear si ya está hasheado
        if (!empty($value) && Hash::needsRehash($value)) {
            $this->attributes['password'] = Hash::make($value);
        } else {
            $this->attributes['password'] = $value;
        }
    }

    /**
     * Relación con la tabla roles: un usuario pertenece a un rol.
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'id_rol');
    }
}