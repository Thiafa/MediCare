@extends('layouts.app')

@section('content')
    <div class="app-main">
        <x-app-content-header title="{{ __('Client') }}" :breadcrumbs="[['label' => __('User'), 'url' => route('pacientes.index')], ['label' => __('User')]]" />
        <div class="app-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        {{ __('Create') }}
                    </div>
                    <form action="{{ route('pacientes.store') }}" class="needs-validation" method="POST"
                        id="form-create-pacientes" enctype="multipart/form-data">
                        @csrf
                        @include('pacientes._partials.form')
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Voltar</a>
                                <button class="btn btn-primary"
                                    type="submit">{{ isset($user) ? __('Save') : __('Save') }}</button>
                            </div>
                        </div>
                    </form>
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

            $('#form-create-pacientes').submit(function() {
                $('#cpf').unmask();
            })
        });
    </script>
@endpush
