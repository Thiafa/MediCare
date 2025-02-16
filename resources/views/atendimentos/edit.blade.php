@extends('layouts.app')

@section('content')
    <div class="app-main">
        <x-app-content-header title="{{ __('Atendimentos') }}" :breadcrumbs="[['label' => __('listar'), 'url' => route('atendimentos.index')], ['label' => __('atendimentos')]]" />
        <div class="app-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        {{ __('Edit') }}
                    </div>
                    <form action="{{ route('atendimentos.update', $atendimento->id) }}" class="needs-validation" method="POST"
                        enctype="multipart/form-data" id="form-edit-atendimento">
                        @csrf
                        @method('PUT')
                        @include('atendimentos._partials.form')
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('atendimentos.index') }}" class="btn btn-secondary">Voltar</a>
                                <button class="btn btn-primary"
                                    type="submit">{{ isset($atendimento) ? __('Save') : __('Register') }}</button>
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
            $('#data_atendimento').mask('99-99-9999');

            $('#form-edit-atendimento').submit(function() {
                $('#cpf').unmask();
            })
        })
    </script>
@endpush
