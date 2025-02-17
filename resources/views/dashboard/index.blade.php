@extends('layouts.app')

@section('content')
    <div class="app-main">
        <x-app-content-header title="{{ __('Relatórios') }}" :breadcrumbs="[['label' => __('listar'), 'url' => route('dashboard')], ['label' => __('Relatórios')]]" />
        <div class="app-content">
            <div class="container-fluid">
                @livewire('dashboard')
            </div>
        </div>
    </div>
@endsection
