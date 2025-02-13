@extends('layouts.app')

@section('content')
    <div class="app-main">
        <x-app-content-header title="{{ __('Client') }}" :breadcrumbs="[['label' => __('Paciente'), 'url' => route('pacientes.index')], ['label' => __('Paciente')]]" />
        <div class="app-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        {{ __('Edit') }}
                    </div>
                    <form action="{{ route('pacientes.update', $paciente->id) }}" class="needs-validation" method="POST"
                        enctype="multipart/form-data" id="form-edit-pacientes">
                        @csrf
                        @method('PUT')
                        @include('pacientes._partials.form')
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Voltar</a>
                                <button class="btn btn-primary"
                                    type="submit">{{ isset($paciente) ? __('Save') : __('Register') }}</button>
                            </div>
                        </div>
                    </form>
                    <br />
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#cpf').mask('999.999.999-99');
            $('#data_nascimento').mask('99-99-9999');

            $('#form-edit-pacientes').submit(function() {
                $('#cpf').unmask();
            })
        })
    </script>
@endpush
