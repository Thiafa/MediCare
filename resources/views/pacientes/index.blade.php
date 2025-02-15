@extends('layouts.app')

@section('content')
    <div class="app-main">
        <x-app-content-header title="{{ __('Paciente') }}" :breadcrumbs="[['label' => __('Paciente'), 'url' => route('pacientes.index')], ['label' => __('Paciente')]]" />
        <div class="app-content">
            <div class="container-fluid">
                @include('pacientes.components.search')
                <div class="card mb-4">
                    <div class="card-header">{{ __('Pacientes') }}</div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th class="col-md-5">{{ __('Name') }}</th>
                                    <th class="col-md-5">{{ __('CPF') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pacientes as $paciente)
                                    <tr class="align-middle">
                                        <td>{{ $paciente->id }}</td>
                                        <td>{{ $paciente->nome }}</td>
                                        <td>{{ $paciente->getMaskedCpfAttribute($paciente->cpf) }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('pacientes.show', $paciente->id) }}"
                                                    class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                                                <a href="{{ route('pacientes.edit', $paciente->id) }}"
                                                    class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>
                                                <button data-bs-toggle="modal"
                                                    data-bs-target="#deletePacienteModal-{{ $paciente->id }}"
                                                    class="btn btn-danger"><i class="fa-solid fa-box-archive"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('pacientes.components.modal')
                                @empty
                                    <tr class="text-center">
                                        <td colspan="4">
                                            {{ __('Nenhum registro encontrado') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if ($pacientes->hasPages())
                        <div class="m-auto mt-2">
                            {{ $pacientes->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
