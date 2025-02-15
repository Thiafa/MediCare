<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchMedicoRequest;
use App\Http\Requests\StoreMedicoRequest;
use App\Http\Requests\UpdateMedicoRequest;
use App\Models\Medico;
use App\Services\MedicoService;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function __construct(protected MedicoService $medicoService) {}
    /**
     * Display a listing of the resource.
     */
    public function index(SearchMedicoRequest $request)
    {
        $medicos = $this->medicoService->all($request, 10);
        return view('medicos.index', ['medicos' => $medicos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicoRequest $request)
    {
        $data = $request->validated();
        $this->medicoService->create($data);
        return redirect()->route('medicos.index')->with('success', "Registro criado com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('medicos.show', ['medico' => $this->medicoService->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('medicos.edit', ['medico' => $this->medicoService->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicoRequest $request, string $id)
    {
        $data = $request->validated();
        $this->medicoService->update($data, $id);
        return redirect()->route('medicos.index')->with('success', "Registro atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->medicoService->delete($id);
        return redirect()->route('medicos.index')->with('success', "Registro deletado com sucesso!");
    }
}
