<?php

namespace App\Services;

use App\Interfaces\MedicoRepositoryInterface;

class MedicoService
{
    public function __construct(protected MedicoRepositoryInterface $medicoRepository) {}

    public function all($perPage = null)
    {
        return $this->medicoRepository->getAllMedicos($perPage);
    }
    public function create(array $data)
    {
        return $this->medicoRepository->createMedico($data);
    }

    public function find($id)
    {
        return $this->medicoRepository->getMedicoById($id);
    }

    public function update(array $data, $id)
    {
        return $this->medicoRepository->updateMedico($id, $data);
    }

    public function delete($id)
    {
        return $this->medicoRepository->deleteMedico($id);
    }
}
