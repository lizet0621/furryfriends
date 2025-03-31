<?php

namespace App\Contracts;

use App\Models\ViabilidadEstudio;

interface ViabilidadEstudioServiceInterface
{
    public function listarEstudios();
    public function crearEstudio(array $data);
    public function obtenerEstudio(int $id);
    public function actualizarEstudio(ViabilidadEstudio $estudio, array $data);
    public function eliminarEstudio(ViabilidadEstudio $estudio);
}