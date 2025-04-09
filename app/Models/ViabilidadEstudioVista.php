<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViabilidadEstudioVista extends Model
{
    use HasFactory;

    protected $table = 'viabilidadEstudios';

    protected $fillable = ['archivo', 'nombre_original', 'rol_id', 'user_id', 'activo'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}