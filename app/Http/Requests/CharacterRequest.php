<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CharacterRequest extends FormRequest
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
            'nom' => 'required|min:2|max:10|regex:/^[a-zA-Z]*$/'
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Le champs ne doit pas être vide',
            'nom.min'  => 'Il faut au moins 2 caractères',
            'nom.max'  => 'Il faut au minimum 10 caractères',
            'nom.regex'  => 'Vous devez utiliser que des lettres'
        ];
    }
}
