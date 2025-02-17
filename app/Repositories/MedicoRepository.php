<?php

namespace App\Repositories;

use App\Interfaces\MedicoRepositoryInterface;
use App\Models\Medico;

class MedicoRepository implements MedicoRepositoryInterface
{
    public function getAllMedicos($request, $perPage = 10)
    {
        return Medico::search($request)->paginate($perPage);
    }

    public function getMedicoById($medicoId)
    {
        return Medico::findOrFail($medicoId);
    }

    public function createMedico(array $MedicoData)
    {
        return Medico::create($MedicoData);
    }

    public function updateMedico($medicoId, array $newData)
    {
        return Medico::whereId($medicoId)->update($newData);
    }

    public function deleteMedico($medicoId)
    {
        Medico::destroy($medicoId);
    }
}
