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
            'name' => 'nullable|string|max:255',
            'cpf' => ['cpf', 'required', 'string', 'size:11', 'unique:pacientes,cpf,' . $id, 'cpf'],
            'email' => 'nullable|email|unique:users,email,' . $id,
            'data_nascimento' => ['nullable', 'date', 'date_format:d-m-Y', 'before:today']
        ];
    }
}
