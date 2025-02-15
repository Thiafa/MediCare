<?php

namespace App\Interfaces;

interface MedicoRepositoryInterface
{
    function getAllMedicos(string $request, int $perPage = null);
    function getMedicoById($medicoId);
    function deleteMedico($medicoId);
    function createMedico(array $medicoData);
    function updateMedico($pacienteId, array $newData);
}
