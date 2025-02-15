@extends('layouts.app')

@section('content')
    <div class="app-main">
        <x-app-content-header title="{{ __('Paciente') }}" :breadcrumbs="[['label' => __('Paciente'), 'url' => route('pacientes.index')], ['label' => __('Paciente')]]" />
        <div class="app-content">
            <div class="container-fluid">
                <div class="card mb-4">
                    <div class="card-header">{{ __('Search') }}</div>
                    <form action="{{ route('pacientes.index') }}">
                        @csrf
                        <div class="card-body">
                            <div class="row mt-2">
                                <div class="col-md-1">
                                    <label for="id" class="form-label">{{ __('Id') }}</label>
                                    <input type="search" class="form-control @error('id') is-invalid @enderror"
                                        value="{{ old('id', request()->id) ?? '' }}" name="id" id="id">
                                    @error('id')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-5">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <input type="search" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', request()->name) ?? '' }}" name="name" id="name">
                                    @error('name')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="id" class="form-label">{{ __('CPF') }}</label>
                                    <input type="search" class="form-control @error('cpf') is-invalid @enderror"
                                        value="{{ old('cpf', request()->cpf) ?? '' }}" name="cpf" id="cpf">
                                    @error('cpf')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for="status" class="form-label">{{ __('Status') }}</label>
                                    <select class="form-select" name="status" id="status">
                                        <option value=""></option>
                                        <option value="ativo"
                                            {{ old('status', request()->status) == 'ativo' ? 'selected' : '' }}>
                                            {{ __('Ativo') }}</option>
                                        <option value="inativo"
                                            {{ old('status', request()->status) == 'inatvo' ? 'selected' : '' }}>
                                            {{ __('Arquivado') }}</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-3 d-flex justify-content-between">
                                <div>
                                    <a href="{{ route('pacientes.create') }}"
                                        class="btn btn-outline-primary">{{ __('Create') }}</a>
                                </div>
                                <div class="btn-group">
                                    <a href="{{ route('pacientes.index') }}"
                                        class="btn btn-secondary">{{ __('Search Clear') }}</a>
                                    <button class="btn btn-primary">{{ __('Search') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

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
