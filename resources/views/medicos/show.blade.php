@extends('layouts.app')

@section('content')
    <div class="app-main">
        <x-app-content-header title="{{ __('Médicos') }}" :breadcrumbs="[['label' => __('Listar'), 'url' => route('medicos.index')], ['label' => __('Visualizar')]]" />
        <div class="app-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        {{ __('Visualizar') }}
                    </div>
                    <div class="card-body container-fluid">
                        <h5 class="mb-3">Dados Pessoais</h5>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-6">
                                <label for="nome" class="form-label">{{ __('Nome') }}</label>
                                <input type="text" class="form-control @error('nome') is-invalid @enderror"
                                    name="nome" id="nome" value="{{ $medico->nome }}" required disabled>
                                @error('nome')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="crm" class="form-label">{{ __('CRM') }}</label>
                                <input type="text" class="form-control @error('crm') is-invalid @enderror" name="crm"
                                    id="crm" value="{{ $medico->crm }}" required disabled>
                                @error('crm')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-6">
                                <label for="especialidade" class="form-label">{{ __('Especialidade') }}</label>
                                <input type="text" class="form-control @error('especialidade') is-invalid @enderror"
                                    name="especialidade" id="especialidade" value="{{ $medico->especialidade }}" required
                                    disabled>
                                @error('especialidade')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('medicos.index') }}" class="btn btn-secondary"
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
