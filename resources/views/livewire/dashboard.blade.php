<div class="card mb-4">
    <div class="card-header">{{ __('Dashboard') }}</div>
    <div class="card-body">
        <div class="form-group">
            <label for="pesquisaMedico" class="form-label">Pesquisar Médico</label>
            <input type="text" wire:model.live.debounce.250ms="pesquisaMedico" class="form-control" id="pesquisaMedico"
                placeholder="Digite o nome do médico...">
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th class="col-md-5">{{ __('Médico') }}</th>
                        <th class="col-md-5">{{ __('Paciente') }}</th>
                        <th class="col-md-5">{{ __('Data do Atendimento') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicosFiltrados as $medico)
                        @foreach ($medico->atendimentos as $atendimento)
                            <tr class="align-middle">
                                <td>{{ $atendimento->id }}</td>
                                <td>{{ $medico->nome }}</td>
                                <td>{{ $atendimento->paciente->nome }}</td>
                                <td>{{ $atendimento->data_atendimento->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                    @endforeach

                    @if ($medicosFiltrados->isEmpty())
                        <tr class="text-center">
                            <td colspan="4">
                                {{ __('Nenhum registro encontrado') }}
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
