<div class="card-body container-fluid">
    <div class="row g-3 mb-3">
        <div class="col-sm-6">
            <label for="nome" class="form-label">{{ __('Name') }} *</label>
            <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" id="nome"
                value="{{ old('nome', $medico->nome ?? '') }}" required>
            @error('nome')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-sm-6">
            <label for="crm" class="form-label">{{ __('CRM') }} *</label>
            <input type="text" class="form-control @error('crm') is-invalid @enderror" name="crm" id="crm"
                value="{{ old('crm', $medico->crm ?? '') }}">
            @error('crm')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-sm-6">
            <label for="especialidade" class="form-label">{{ __('Especialidade') }} *</label>
            <input type="text" class="form-control @error('especialidade') is-invalid @enderror" name="especialidade"
                id="especialidade" value="{{ old('especialidade', $medico->especialidade ?? '') }}" required>
            @error('especialidade')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>
