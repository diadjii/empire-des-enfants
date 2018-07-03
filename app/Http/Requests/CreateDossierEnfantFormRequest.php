<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDossierEnfantFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
          'nom'           => 'required|min:2',
          'prenom'        => 'required|min:3',
          'dateNaissance' => 'required',
          'lieuNaissance' => 'required',
          'origine'       => 'required',
          'adresse'       => 'required',
          'prenomPere'    => 'required',
          'nomMere'       => 'required',
          'prenomMere'    => 'required',
          'numTel'        => 'required|size:9',
          'photoEnfant'   => 'mimes:jpeg,jpg,png',
          'profilEnfant'  => 'required',
          'description'   => 'required'
        ];
    }


}
