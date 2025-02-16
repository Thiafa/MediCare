<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchAtendimentoRequest;
use App\Http\Requests\StoreAtendimentoRequest;
use App\Http\Requests\UpdateAtendimentoRequest;
use App\Models\Atendimento;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;

class AtendimentoController extends Controller
{
    public $medicos;
    public $pacientes;

    public function __construct()
    {
        $this->pacientes = Paciente::all();
        $this->medicos = Medico::all();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(SearchAtendimentoRequest $request)
    {
        $atendimentos = Atendimento::with('medico', 'paciente')->search($request)->paginate(10);
        return view('atendimentos.index', ['atendimentos' => $atendimentos, 'medicos' => $this->medicos, 'pacientes' => $this->pacientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('atendimentos.create', ['medicos' => $this->medicos, 'pacientes' => $this->pacientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAtendimentoRequest $request)
    {
        Atendimento::create($request->validated());
        return redirect()->route('atendimentos.index')->with('success', 'Registro criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $atendimento = Atendimento::find($id);
        return view('atendimentos.show', ['atendimento' => $atendimento]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $atendimento = Atendimento::find($id);
        return view('atendimentos.edit', ['atendimento' => $atendimento, 'medicos' => $this->medicos, 'pacientes' => $this->pacientes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAtendimentoRequest $request, string $id)
    {
        $atendimento = Atendimento::find($id);
        $atendimento->fill($request->validated());
        $atendimento->save();
        return redirect()->route('atendimentos.index')->with('success', 'Registro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $atendimento = Atendimento::find($id);
        $atendimento->delete();
        return redirect()->route('atendimentos.index')->with('success', 'Registro deletado com sucesso!');
    }
}
