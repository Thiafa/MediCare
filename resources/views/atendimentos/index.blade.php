@extends('layouts.app')

@section('content')
    <div class="app-main">
        <x-app-content-header title="{{ __('Atendimentos') }}" :breadcrumbs="[['label' => __('listar'), 'url' => route('atendimentos.index')], ['label' => __('atendimentos')]]" />
        <div class="app-content">
            <div class="container-fluid">
                @include('atendimentos.components.search')
                <div class="card mb-4">
                    <div class="card-header">{{ __('Atendimentos') }}</div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th class="col-md-5">{{ __('Médico') }}</th>
                                    <th class="col-md-5">{{ __('Paciente') }}</th>
                                    <th class="col-md-5">{{ __('Data do Atendimento') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($atendimentos as $atendimento)
                                    <tr class="align-middle">
                                        <td>{{ $atendimento->id }}</td>
                                        <td>{{ $atendimento->medico->nome }}</td>
                                        <td>{{ $atendimento->paciente->nome }}</td>
                                        <td>{{ $atendimento->data_atendimento->format('d/m/Y') }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('atendimentos.show', $atendimento->id) }}"
                                                    class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                                                <a href="{{ route('atendimentos.edit', $atendimento->id) }}"
                                                    class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>
                                                <button data-bs-toggle="modal"
                                                    data-bs-target="#deleteAtendimento-{{ $atendimento->id }}"
                                                    class="btn btn-danger"><i class="fa-solid fa-box-archive"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('atendimentos.components.modal')
                                @empty
                                    <tr class="text-center">
                                        <td colspan="5">
                                            {{ __('Nenhum registro encontrado') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if ($atendimentos->hasPages())
                        <div class="m-auto mt-2">
                            {{ $atendimentos->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
