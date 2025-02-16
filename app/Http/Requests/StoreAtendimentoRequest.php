<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAtendimentoRequest extends FormRequest
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
            'medico_id' => ['required', 'exists:medicos,id'],
            'paciente_id' => ['required', 'exists:pacientes,id'],
            'data_atendimento' => ['required', 'date', 'before:today']
        ];
    }
    public function attributes()
    {
        return [
            'medico_id' => 'médico',
            'paciente_id' => 'paciente',
            'data_atendimento' => 'data de atendimento'
        ];
    }
}
