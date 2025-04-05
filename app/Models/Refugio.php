<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Refugio extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nombre',
        'telefono',
        'email',
        'password',
        'tipo_refugio',
        'direccion',
        'ciudad',
        'capacidad',
        'horarios',
        'responsable',
        'servicios',
        'foto'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'capacidad' => 'integer',
        'horarios' => 'array',
        'servicios' => 'array',
    ];
}
