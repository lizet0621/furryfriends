<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perros extends Model
{
    use HasFactory;

    protected $table = 'perros'; // Laravel suele usar minúsculas y plural por convención.

    protected $fillable = [
        'nombre', 'edad', 'imagenperro', 'raza', 'color', 
        'tamanio', 'sexo', 'historial_clinico', 'descripcion', 
        'refugio_id', 'disponible', 'fecha_adopcion'
    ];

    public function refugio() {
        return $this->belongsTo(Refugio::class, 'refugio_id');
    }
}
