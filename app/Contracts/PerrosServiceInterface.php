<?php

namespace App\Contracts;

use App\Models\Perros;

interface PerrosServiceInterface
{
    public function listarPerros();
    public function crearPerros(array $data);
    public function obtenerPerros(int $id);
    public function actualizarPerros(Perros $Perros, array $data);
    public function eliminarPerros(Perros $Perros);
}