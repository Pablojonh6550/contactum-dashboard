<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'string', 'regex:/^[0-9]{9}$/', 'unique:contacts,contact_number'],
            'email' => ['required', 'email', 'max:255', 'unique:contacts,email'],
        ];
    }

    public function messages()
    {
        return [

            'email.email' => 'O email deve ser válido.',
            'email.max' => 'O email deve ter no máximo 255 caracteres.',
            'email.unique' => 'O email já está em uso.',
            'email.required' => 'O email é obrigatório.',
            'name.required' => 'O nome é obrigatório.',
            'contact_number.required' => 'O número de telefone é obrigatório.',
            'contact_number.regex' => 'O número de telefone deve ter 9 dígitos.',
            'contact_number.unique' => 'O número de telefone já está em uso.',
        ];
    }
}
