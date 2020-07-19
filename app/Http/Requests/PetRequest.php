<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetRequest extends FormRequest
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
            'name'        => 'required|string',
            'descricao'   => 'required|string',
            'age'         => 'required|integer',
            'users_id'    => 'required|numeric|exists:users,id',
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
            'name.required'      => 'O campo nome é obrigatório',
            'descricao.required' => 'O campo descrição é obrigatório',
            'age.required'       => 'O campo idade é obrigatório',
            'users_id.required'  => 'O campo usuário é obrigatório',
        ];
    }
}
