<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguimientoVisitas extends Model
{
    use HasFactory;

    protected $table = 'seguimientovisitas';
    protected $fillable = [
        'adoptante_id',
        'archivo',
        'activo',
    ];

    public function adoptante()
    {
        return $this->belongsTo(Adoptante::class);
    }
}