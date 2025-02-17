@extends('layouts.app')

@section('content')
    <div class="app-main">
        <x-app-content-header title="{{ __('Médicos') }}" :breadcrumbs="[['label' => __('Listar'), 'url' => route('medicos.index')], ['label' => __('Editar')]]" />
        <div class="app-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        {{ __('Edit') }}
                    </div>
                    <form action="{{ route('medicos.update', $medico->id) }}" class="needs-validation" method="POST"
                        enctype="multipart/form-data" id="form-edit-medicos">
                        @csrf
                        @method('PUT')
                        @include('medicos._partials.form')
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Voltar</a>
                                <button class="btn btn-primary"
                                    type="submit">{{ isset($medico) ? __('Save') : __('Register') }}</button>
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

            $('#form-edit-medicos').submit(function() {
                $('#cpf').unmask();
            })
        })
    </script>
@endpush
