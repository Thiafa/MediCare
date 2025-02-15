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
                        <option value="ativo" {{ old('status', request()->status) == 'ativo' ? 'selected' : '' }}>
                            {{ __('Ativo') }}</option>
                        <option value="inativo" {{ old('status', request()->status) == 'inatvo' ? 'selected' : '' }}>
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
                    <a href="{{ route('pacientes.create') }}" class="btn btn-outline-primary">{{ __('Create') }}</a>
                </div>
                <div class="btn-group">
                    <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">{{ __('Search Clear') }}</a>
                    <button class="btn btn-primary">{{ __('Search') }}</button>
                </div>
            </div>
        </div>
    </form>
</div>
