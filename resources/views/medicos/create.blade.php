@extends('layouts.app')

@section('content')
    <div class="app-main">
        <x-app-content-header title="{{ __('Médico') }}" :breadcrumbs="[['label' => __('Listar'), 'url' => route('medicos.index')], ['label' => __('Médicos')]]" />
        <div class="app-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        {{ __('Create') }}
                    </div>
                    <form action="{{ route('medicos.store') }}" class="needs-validation" method="POST" id="form-create-medicos"
                        enctype="multipart/form-data">
                        @csrf
                        @include('medicos._partials.form')
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Voltar</a>
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

            $('#form-create-medicos').submit(function() {
                $('#cpf').unmask();
            })
        });
    </script>
@endpush
