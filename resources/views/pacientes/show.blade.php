@extends('layouts.app')

@section('content')
    <div class="app-main">
        <x-app-content-header title="{{ __('Paciente') }}" :breadcrumbs="[['label' => __('Paciente'), 'url' => route('pacientes.index')], ['label' => __('Paciente')]]" />
        <div class="app-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        {{ __('Show') }}
                    </div>
                    <div class="card-body container-fluid">
                        <h5 class="mb-3">Dados Pessoais</h5>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-6">
                                <label for="nome" class="form-label">{{ __('Nome') }}</label>
                                <input type="text" class="form-control @error('nome') is-invalid @enderror"
                                    name="nome" id="nome" value="{{ old('nome', $paciente->nome ?? '') }}" required
                                    disabled>
                                @error('nome')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="email" class="form-label">{{ __('E-mail') }}</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" value="{{ old('email', $paciente->email ?? '') }}"
                                    required disabled>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-6">
                                <label for="cpf" class="form-label">{{ __('CPF') }}</label>
                                <input type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf"
                                    id="cpf" value="{{ old('cpf', $paciente->cpf ?? '') }}" required disabled>
                                @error('cpf')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="data_nascimento" class="form-label">{{ __('Data de Nascimento') }}</label>
                                <input type="text" class="form-control @error('data_nascimento') is-invalid @enderror"
                                    name="data_nascimento" id="data_nascimento"
                                    value="{{ old('data_nascimento', $paciente->data_nascimento ? $paciente->data_nascimento->format('d-m-Y') : '') }}"
                                    required disabled>
                                @error('data_nascimento')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('pacientes.index') }}" class="btn btn-secondary"
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
