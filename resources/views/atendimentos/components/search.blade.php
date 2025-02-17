<div class="card mb-4">
    <div class="card-header">{{ __('Search') }}</div>
    <form action="{{ route('atendimentos.index') }}">
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
                <div class="col-md-3">
                    <label for="medico" class="form-label">{{ __('Médico') }}</label>
                    <input type="text" class="form-control" name="medico" id="medico"
                        value="{{ old('medico', request()->medico) }}">
                    @error('medico')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="paciente" class="form-label">{{ __('Paciente') }}</label>
                    <input type="text" class="form-control" name="paciente" id="paciente"
                        value="{{ old('paciente', request()->paciente) }}">
                    @error('paciente')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label for="start_date" class="form-label">{{ __('Data de Início') }}</label>
                    <input type="text" class="form-control @error('start_date') is-invalid @enderror"
                        placeholder="dd/mm/yyyy" name="start_date" id="start_date"
                        value="{{ old('start_date', request()->start_date ?? '') }}">
                    @error('start_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label for="end_date" class="form-label">{{ __('Data Final') }}</label>
                    <input type="text" class="form-control @error('end_date') is-invalid @enderror" name="end_date"
                        placeholder="dd/mm/yyyy" id="end_date"
                        value="{{ old('end_date', request()->end_date ?? '') }}">
                    @error('end_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mt-3 d-flex justify-content-between">
                <div>
                    <a href="{{ route('atendimentos.create') }}"
                        class="btn btn-outline-primary">{{ __('Create') }}</a>
                </div>
                <div class="btn-group">
                    <a href="{{ route('atendimentos.index') }}" class="btn btn-secondary">{{ __('Search Clear') }}</a>
                    <button class="btn btn-primary">{{ __('Search') }}</button>
                </div>
            </div>
        </div>
    </form>
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            flatpickr("#start_date", {
                dateFormat: "d-m-Y",
                locale: "pt",
            });
            flatpickr("#end_date", {
                dateFormat: "d-m-Y",
                locale: "pt",
            });
        });
    </script>
@endpush
