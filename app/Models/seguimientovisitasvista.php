<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguimientoVisitasVista extends Model
{
    use HasFactory;

    // Definir la tabla y los campos asignables
    protected $table = 'seguimientoVisitas';
    protected $fillable = ['archivo'];
}