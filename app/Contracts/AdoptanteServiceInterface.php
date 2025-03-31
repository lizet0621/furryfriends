<?php

namespace App\Contracts;

use App\Models\Adoptante;

interface AdoptanteServiceInterface
{
    public function listarAdoptantes();
    public function crearAdoptante(array $data);
    public function obtenerAdoptante(int $id);
    public function actualizarAdoptante(Adoptante $adoptante, array $data);
    public function desactivarAdoptante(Adoptante $adoptante);
}