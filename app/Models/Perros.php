<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perros extends Model
{
    use HasFactory;

    protected $table = 'perros';

    protected $fillable = [
        'nombre',
        'edad',
        'raza',
        'tamanio',
        'descripcion',
        'user_id',         // <--- Cambiado de 'refugio_id' a 'user_id'
        'disponible',
        'imagenperro',
        'sexo',
        'historial_clinico',
        'color',
    ];

    // RELACIÓN CON USUARIO REFUGIO
    public function scopeDisponibles($query)
    {
        return $query->where('disponible', 1);
    }
    
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id'); // Relación con el usuario que registró el perro
    }
}
