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
        'refugio_id',
        'disponible',
        'imagenperro',
        'sexo',
        'historial_clinico',
        'color',

    ];

    // RELACIÓN CON USUARIO REFUGIO
    public function refugio()
    {
   return $this->belongsTo(Refugio::class, 'refugio_id'); // Ajusta 'refugio_id' si usas otro nombre de clave foránea
    }

    public function scopeDisponibles($query)
    {
        return $query->where('disponible', 1);
    }
    public function rol()
{
    return $this->belongsTo(Role::class,'id_rol');
}
}