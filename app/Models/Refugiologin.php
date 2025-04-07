<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refugio extends Model
{
    use HasFactory;

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
    ];
}