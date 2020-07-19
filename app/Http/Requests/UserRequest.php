<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'   => 'required|string',
            'cep'    => 'required|string',
            'number' => 'required|string'
        ];
    }

    
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'   => 'O campo nome é obrigatório',
            'name.string'     => 'O campo nome deve ser enviado como texto',
            'cep.required'    => 'O campo cep é obrigatório',
            'cep.string'      => 'O campo cep deve ser enviado como texto',
            'number.required' => 'O campo número é obrigatório',
            'number.string'   => 'O campo número deve ser enviado como texto',
        ];
    }
}
