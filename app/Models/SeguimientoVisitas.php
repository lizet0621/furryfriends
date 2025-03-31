<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguimientoVisitas extends Model
{
    use HasFactory;

    protected $table = 'SeguimientoVisitas';

    protected $fillable = [
        'adoptante_id',
        'archivo',
    ];

    public function adoptante()
    {
        return $this->belongsTo(Adoptante::class);
    }
}