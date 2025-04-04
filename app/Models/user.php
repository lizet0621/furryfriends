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
        'nombre',
        'email',
        'password',
        'telefono',
        'direccion',
        'ciudad',
        'capacidad',
        'horarios',
        'responsable',
        'servicios',
        'id_rol' // Asegurando que coincida con la base de datos
    ];

    protected $hidden = ['password', 'remember_token'];

    /**
     * Mutador para cifrar la contraseña automáticamente al asignarla.
     */
    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = Hash::make($password);
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
