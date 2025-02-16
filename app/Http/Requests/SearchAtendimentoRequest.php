<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchAtendimentoRequest extends FormRequest
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
            'data_atendimento' => ['nullable', 'date'],
            'medico_id' => ['nullable', 'string'],
            'paciente_id' => ['nullable', 'string'],
            'start_date' => ['nullable', 'date', 'date_format:d-m-Y',  'before_or_equal:end_date'],
            'end_date' => ['nullable', 'date', 'date_format:d-m-Y', 'after_or_equal:start_date'],
        ];
    }

    public function attributes()
    {
        return [
            'start_date' => 'data de ínicio',
            'end_date' => 'data de fim',
        ];
    }
}
