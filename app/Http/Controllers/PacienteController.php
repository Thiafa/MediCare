<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPacienteRequest;
use App\Http\Requests\StorePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;
use App\Models\Paciente;
use App\Services\PacienteService;
use Carbon\Carbon;

class PacienteController extends Controller
{
    public function __construct(protected PacienteService $pacienteService) {}
    /**
     * Display a listing of the resource.
     */
    public function index(SearchPacienteRequest $request)
    {
        $pacientes = $this->pacienteService->all($request, 10);
        return view('pacientes.index', ['pacientes' => $pacientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePacienteRequest $request)
    {
        $data = $request->validated();
        $this->pacienteService->create($data);
        return redirect()->route('pacientes.index')->with('success', "Paciente criado com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('pacientes.show', ['paciente' => $this->pacienteService->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pacientes.edit', ['paciente' => $this->pacienteService->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePacienteRequest $request, string $id)
    {
        $data = $request->validated();
        $data['data_nascimento'] = Carbon::createFromFormat('d-m-Y', $request->data_nascimento)->format('Y-m-d');
        $this->pacienteService->update($data, $id);
        return redirect()->route('pacientes.index')->with('success', "Paciente atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->pacienteService->delete($id);
        return redirect()->route('pacientes.index')->with('success', "Paciente deletado com sucesso!");
    }
}
