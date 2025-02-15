<div class="card mb-4">
    <div class="card-header">{{ __('Search') }}</div>
    <form action="{{ route('medicos.index') }}">
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
                    <label for="nome" class="form-label">{{ __('Nome') }}</label>
                    <input type="search" class="form-control @error('nome') is-invalid @enderror"
                        value="{{ old('nome', request()->nome) ?? '' }}" name="nome" id="nome">
                    @error('nome')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label for="id" class="form-label">{{ __('CRM') }}</label>
                    <input type="search" class="form-control @error('crm') is-invalid @enderror"
                        value="{{ old('crm', request()->crm) ?? '' }}" name="crm" id="crm">
                    @error('crm')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="id" class="form-label">{{ __('Especialidade') }}</label>
                    <input type="search" class="form-control @error('especialidade') is-invalid @enderror"
                        value="{{ old('especialidade', request()->especialidade) ?? '' }}" name="especialidade"
                        id="especialidade">
                    @error('especialidade')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mt-3 d-flex justify-content-between">
                <div>
                    <a href="{{ route('medicos.create') }}" class="btn btn-outline-primary">{{ __('Create') }}</a>
                </div>
                <div class="btn-group">
                    <a href="{{ route('medicos.index') }}" class="btn btn-secondary">{{ __('Search Clear') }}</a>
                    <button class="btn btn-primary">{{ __('Search') }}</button>
                </div>
            </div>
        </div>
    </form>
</div>
