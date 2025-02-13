<div class="card-body container-fluid">
    <div class="row g-3 mb-3">
        <div class="col-sm-6">
            <label for="nome" class="form-label">{{ __('Name') }} *</label>
            <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" id="nome"
                value="{{ old('nome', $paciente->nome ?? '') }}" required>
            @error('nome')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-sm-6">
            <label for="email" class="form-label">{{ __('E-mail') }} *</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                id="email" value="{{ old('email', $paciente->email ?? '') }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-sm-6">
            <label for="cpf" class="form-label">{{ __('CPF') }} *</label>
            <input type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" id="cpf"
                x-model="cpf" x-mask="'999.999.999-99'"
                value="{{ old('cpf', isset($paciente) ? $paciente->cpf : '') }}" required>
            @error('cpf')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-sm-6">
            <label for="data_nascimento" class="form-label">{{ __('Data de Nascimento') }} *</label>
            <input type="text" class="form-control @error('data_nascimento') is-invalid @enderror"
                name="data_nascimento" id="data_nascimento"
                value="{{ old('data_nascimento', isset($paciente) && $paciente->data_nascimento ? $paciente->data_nascimento->format('d-m-Y') : '') }}">
            @error('data_nascimento')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>
