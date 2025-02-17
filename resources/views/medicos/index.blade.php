@extends('layouts.app')

@section('content')
    <div class="app-main">
        <x-app-content-header title="{{ __('Médicos') }}" :breadcrumbs="[['label' => __('Médicos'), 'url' => route('medicos.index')], ['label' => __('Médicos')]]" />
        <div class="app-content">
            <div class="container-fluid">
                @include('medicos.components.search')
                <div class="card mb-4">
                    <div class="card-header">{{ __('Medicos') }}</div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th class="col-md-5">{{ __('Name') }}</th>
                                    <th class="col-md-5">{{ __('CRM') }}</th>
                                    <th class="col-md-5">{{ __('Especialidade') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($medicos as $medico)
                                    <tr class="align-middle">
                                        <td>{{ $medico->id }}</td>
                                        <td>{{ $medico->nome }}</td>
                                        <td>{{ $medico->crm }}</td>
                                        <td>{{ $medico->especialidade }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('medicos.show', $medico->id) }}"
                                                    class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                                                <a href="{{ route('medicos.edit', $medico->id) }}"
                                                    class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>
                                                <button data-bs-toggle="modal"
                                                    data-bs-target="#deletemedicoModal-{{ $medico->id }}"
                                                    class="btn btn-danger"><i class="fa-solid fa-box-archive"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('medicos.components.modal')
                                @empty
                                    <tr class="text-center">
                                        <td colspan="6">
                                            {{ __('Nenhum registro encontrado') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if ($medicos->hasPages())
                        <div class="m-auto mt-2">
                            {{ $medicos->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
