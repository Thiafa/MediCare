<?php

namespace App\Livewire;

use App\Models\Atendimento;
use App\Models\Medico;
use App\Models\Paciente;
use Livewire\Component;

class Dashboard extends Component
{
    public $medicos;
    public $pesquisaMedico = '';

    public $atendimentosPorMedicoCount = 0;
    public $atendimentosPorMedico = [];
    public $medicosFiltrados = [];

    public function mount()
    {
        $this->medicos = Medico::with('atendimentos')->orderBy('nome')->get();
        $this->medicosFiltrados = $this->medicos;
    }

    public function updatedPesquisaMedico()
    {
        if ($this->pesquisaMedico) {
            $this->medicosFiltrados = Medico::where('nome', 'like', '%' . $this->pesquisaMedico . '%')->with('atendimentos')->orderBy('nome')->get();
        } else {
            $this->medicosFiltrados = $this->medicos;
        }
    }

    public function render()
    {
        return view(
            'livewire.dashboard'
        );
    }
}
