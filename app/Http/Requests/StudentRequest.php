<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'surname' => 'required|string|min:3',
            'email' => 'required|email|unique:students,email|min:5',
            'department' => 'required|string|min:3',
            'telephone' => 'required'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Le prénom est obligatoire',
            'surname.required' => 'Le nom est obligatoire',
            'email.required' => 'L\'email est obligatoire',
            'department.required' => 'Le département est obligatoire',
            'telephone.required' => 'Le téléphone est obligatoire',

            'name.min' => 'Le prénom doit faire au moins 3 caractères',
            'surname.min' => 'Le nom doit faire au moins 3 caractères',
            'email.min' => 'L\'email doit faire au moins 5 caractères',
            'department.min' => 'Le mot de passe doit avoir au moins 3 caractères',

            'email.unique' => 'L\'email n\'est pas disponible',
        ];
    }
}
