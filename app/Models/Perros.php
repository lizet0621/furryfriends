<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perros extends Model
{
    use HasFactory;

    protected $table = 'Perros'; 
    protected $fillable = ['nombre', 'edad', 'raza', 'tamanio', 'descripcion', 'refugio_id', 'disponible'];

    public function refugio() {
        return $this->belongsTo(Refugio::class, 'refugio_id'); // Ajusta 'refugio_id' si usas otro nombre de clave foránea
    }
}