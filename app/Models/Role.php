<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
protected $table = 'roles'; // Nombre de la tabla en la base de datos
    // Relación con User
    public function users()
    {
        return $this->hasMany(User::class, 'id_rol');
        
    }
}
