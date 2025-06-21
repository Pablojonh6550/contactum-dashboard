<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateContactRequest extends FormRequest
{
    /**
     * Autoriza a requisição.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Regras de validação para a atualização de um contato.
     */
    public function rules(): array
    {
        $contactId = $this->route('id');

        return [
            'name' => ['required', 'string', 'max:255'],
            'contact_number' => [
                'required',
                'string',
                'regex:/^[0-9]{9}$/',
                Rule::unique('contacts', 'contact_number')->ignore($contactId),
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('contacts', 'email')->ignore($contactId),
            ],
        ];
    }

    /**
     * Mensagens personalizadas de erro.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'O email deve ser válido.',
            'email.max' => 'O email deve ter no máximo 255 caracteres.',
            'email.unique' => 'Este email já está em uso por outro contato.',
            'contact_number.required' => 'O número de telefone é obrigatório.',
            'contact_number.regex' => 'O número de telefone deve ter 9 dígitos.',
            'contact_number.unique' => 'Este número de telefone já está em uso por outro contato.',
        ];
    }
}
