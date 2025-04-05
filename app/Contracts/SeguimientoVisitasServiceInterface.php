<?php

namespace App\Contracts;
use App\Models\SeguimientoVisitas;
interface SeguimientoVisitasServiceInterface
{
    public function listarSeguimientos();
    public function crearSeguimiento(array $data);
    public function obtenerSeguimiento(int $id);
    public function actualizarSeguimiento(SeguimientoVisitas $seguimiento, array $data);
    public function eliminarSeguimiento(SeguimientoVisitas $seguimiento);
}