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
    ];
    public function adoptante()
    {
        return $this->belongsTo(Adoptante::class);
    }
    public function refugio()
    {
        return $this->belongsTo(Refugio::class);
    }
}