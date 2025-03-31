<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Adoptante extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'password',
        'direccion',
    ];

    protected $hidden = [
        'password',
    ];

    // Hash automático de la contraseña
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}