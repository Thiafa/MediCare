<div class="card-body container-fluid">
    <div class="row gap-3">
        <div class="col-12">
            <label for="medico_id" class="form-label">{{ __('Médico') }}</label>
            <select class="form-select @error('medico_id') is-invalid @enderror" name="medico_id" id="medico_id">
                <option value=""></option>
                @foreach ($medicos as $medico)
                    <option value="{{ $medico->id }}"
                        {{ (old('medico_id') ?? ($atendimento->medico_id ?? '')) == $medico->id ? 'selected' : '' }}>
                        {{ $medico->nome }}
                    </option>
                @endforeach
            </select>
            @error('medico_id')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="col-12">
            <label for="paciente_id" class="form-label">{{ __('Paciente') }}</label>
            <select class="form-select @error('paciente_id') is-invalid @enderror" name="paciente_id" id="paciente_id">
                <option value=""></option>
                @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente->id }}"
                        {{ (old('paciente_id') ?? ($atendimento->paciente_id ?? '')) == $paciente->id ? 'selected' : '' }}>
                        {{ $paciente->nome }}
                    </option>
                @endforeach
            </select>
            @error('paciente_id')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="col-12">
            <label for="atendimento" class="form-label">{{ __('Data do Atendimento') }}</label>
            <input type="text" class="form-control @error('data_atendimento') is-invalid @enderror"
                name="data_atendimento" id="data_atendimento"
                value="{{ old('data_atendimento', isset($atendimento) ? $atendimento->data_atendimento->format('d-m-Y') : '') }}">
            @error('data_atendimento')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>
