<?php

namespace App\Repositories;

use App\Interfaces\PacienteRepositoryInterface;
use App\Models\Paciente;

class PacienteRepository implements PacienteRepositoryInterface
{
    public function getAllPacientes($request, $perPage = 10)
    {
        return Paciente::search($request)->paginate($perPage);
    }

    public function getPacienteById($pacienteId)
    {
        return Paciente::findOrFail($pacienteId);
    }

    public function createPaciente(array $PacienteData)
    {
        return Paciente::create($PacienteData);
    }

    public function updatePaciente($pacienteId, array $newData)
    {
        return Paciente::whereId($pacienteId)->update($newData);
    }

    public function deletePaciente($pacienteId)
    {
        Paciente::destroy($pacienteId);
    }
}
