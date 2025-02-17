<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAtendimentoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'medico_id' => ['exists:medicos,id'],
            'peciente_id' => ['exists:pacientes,id'],
            'data_atendimento' => ['date', 'date_format:d-m-Y', 'before_or_equal:today']
        ];
    }

    public function messages()
    {
        return [
            'data_atendimento.before_or_equal' => 'A data de atendimento não pode ser posterior a hoje.',
        ];
    }
}
