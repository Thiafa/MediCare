<?php

namespace App\Interfaces;

interface PacienteRepositoryInterface
{
    function getAllPacientes(string $request, int $perPage = null);
    function getPacienteById($pacienteId);
    function deletePaciente($pacienteId);
    function createPaciente(array $pacienteData);
    function updatePaciente($pacienteId, array $newData);
}
