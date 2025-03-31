<?php

namespace App\Contracts;

use App\Models\Refugio;

interface RefugioServiceInterface
{
    public function listarRefugios();
    public function crearRefugio(array $data);
    public function obtenerRefugio(int $id);
    public function actualizarRefugio(Refugio $refugio, array $data);
    public function eliminarRefugio(Refugio $refugio);
}