<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessionnelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'numero_de_telephone' => ['required', 'string', 'max:20'],
            'password' => ['nullable', 'string', 'max:25'],
            'metier_id' => ['required', 'exists:metiers,id'],
            'competences' => ['nullable', 'array'],
            'competences.*' => ['exists:competences,id'],
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Le nom est obligatoire',
            'nom.max' => 'Le nom ne doit pas dépasser 255 caractères',
            'email.required' => 'L\'email est obligatoire',
            'email.email' => 'L\'email doit être une adresse valide',
            'email.max' => 'L\'email ne doit pas dépasser 255 caractères',
            'numero_de_telephone.required' => 'Le numéro de téléphone est obligatoire',
            'numero_de_telephone.max' => 'Le numéro de téléphone ne doit pas dépasser 20 caractères',
            'password.required' => 'Le mot de passe est obligatoire',
            'password.max' => 'Le mot de passe ne doit pas dépasser 25 caractères',
            'competences.array' => 'Les compétences doivent être un tableau',
            'competences.*.exists' => 'Une ou plusieurs compétences sélectionnées n\'existent pas',
        ];
    }
}
