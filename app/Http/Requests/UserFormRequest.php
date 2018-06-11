<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'login'   => 'required|min:6',
            'nom'     => 'required|min:2',
            'prenom' =>   'required|min:3',
            "password" => 'required|min:6',
            "typeUser" => 'required',
        ];
    }
}
