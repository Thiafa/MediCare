<?php

namespace App\Services;

use App\Interfaces\PacienteRepositoryInterface;


class PacienteService
{
    public function __construct(protected PacienteRepositoryInterface $pacienteRepository) {}

    public function all($perPage = null)
    {
        return $this->pacienteRepository->getAllPacientes($perPage);
    }
    public function create(array $data)
    {
        return $this->pacienteRepository->createPaciente($data);
    }

    public function find($id)
    {
        return $this->pacienteRepository->getPacienteById($id);
    }

    public function update(array $data, $id)
    {
        return $this->pacienteRepository->updatePaciente($id, $data);
    }

    public function delete($id)
    {
        return $this->pacienteRepository->deletePaciente($id);
    }
}
