<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AddContratRequest extends FormRequest
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
      'numero_contrat' => ['required', Rule::unique('contrats', 'numero_contrat')
        ->ignore($this->contrat)],
      'bien_immobilier_id' => 'required|exists:bien_immobiliers,id',
      'date_debut' => 'required',
      'date_fin' => 'required',
      'montant' => 'required|numeric',
      'type_contrat' => 'required|string',
      'client_id' => 'required|exists:users,id,role,client',
    ];
  }

  public function messages(): array
  {
    return [
      'bien_immobilier_id.required' => 'Le bien immobilier est obligatoire',
      'bien_immobilier_id.exists' => 'Le bien immobilier n\'existe pas',
      'date_debut.required' => 'La date de début est obligatoire',
      'date_fin.required' => 'La date de fin est obligatoire',
      'montant.required' => 'Le montant est obligatoire',
      'type_contrat.required' => 'Le type de contrat est obligatoire',
      'agent_id.required' => 'L\'agent est obligatoire',
      'client_id.required' => 'Le client est obligatoire',
      'proprietaire_id.required' => 'Le proprietaire est obligatoire',
      'numero_contrat.unique' => 'Le numéro de contrat existe déjà',
    ];
  }
}
