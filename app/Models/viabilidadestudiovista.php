<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViabilidadEstudioVista extends Model
{
    use HasFactory;
    protected $table = 'ViabilidadEstudios'; // Nombre real de la tabla en la BD
    protected $fillable = ['archivo'];
}