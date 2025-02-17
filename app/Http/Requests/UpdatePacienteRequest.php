<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePacienteRequest extends FormRequest
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
        $id = request()->route('paciente');

        return [
            'nome' => ['string', 'max:255'],
            'cpf' => ['cpf', 'string', 'size:11', 'unique:pacientes,cpf,' . $id],
            'email' => ['email', 'unique:pacientes,email,' . $id],
            'data_nascimento' => ['date', 'date_format:d-m-Y', 'before:today', 'after:1930-01-01']
        ];
    }

    public function messages()
    {
        return [
            'data_nascimento.after' => 'A data de nascimento deve ser posterior a 01-01-1930.',
            'data_nascimento.before' => 'A data deve ser anterior a de hoje.',
        ];
    }
}
