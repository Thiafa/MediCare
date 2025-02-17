@extends('layouts.app')

@section('content')
    <div class="app-main">
        <x-app-content-header title="{{ __('Atendimento') }}" :breadcrumbs="[['label' => __('Listar'), 'url' => route('atendimentos.index')], ['label' => __('Visualizar')]]" />
        <div class="app-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        {{ __('Visualizar') }}
                    </div>
                    <div class="card-body container-fluid">
                        <h5 class="mb-3">Dados de Atendimento</h5>
                        <div class="col-12 mb-3">
                            <label for="medico_id" class="form-label">{{ __('Médico') }}</label>
                            <input type="text" class="form-control" value="{{ $atendimento->medico->nome }}" disabled
                                readonly>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="paciente_id" class="form-label">{{ __('Paciente') }}</label>
                            <input type="text" class="form-control" value="{{ $atendimento->medico->nome }}" disabled
                                readonly>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="atendimento" class="form-label">{{ __('Data do Atendimento') }}</label>
                            <input type="date" class="form-control @error('data_atendimento') is-invalid @enderror"
                                name="data_atendimento" id="data_atendimento"
                                value="{{ $atendimento->data_atendimento->format('Y-m-d') }}" readonly disabled>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('atendimentos.index') }}" class="btn btn-secondary"
                                title="Voltar">{{ __('Voltar') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#cpf').mask('999.999.999-99');
        $('#data_nascimento').mask('99-99-9999');
    </script>
@endpush
