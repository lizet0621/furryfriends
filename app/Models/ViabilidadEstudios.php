<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViabilidadEstudios extends Model
{
    use HasFactory;

    protected $table = 'ViabilidadEstudios';

    protected $fillable = [
        'adoptante_id',
        'refugio_id',
        'archivo',
        'nombre_original',
        'activo', // <- ¡Asegúrate de tener este campo aquí!
    ];

    public function adoptante()
    {
        return $this->belongsTo(User::class, 'adoptante_id');
    }

    public function refugio()
    {
        return $this->belongsTo(User::class, 'refugio_id');
    }
}