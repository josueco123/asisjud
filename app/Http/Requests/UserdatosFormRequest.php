<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserdatosFormRequest extends FormRequest
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
            //
            'apellido'=> 'required|min:2',
            'cedula' => 'required|numeric',
            'celular' => 'required|numeric|min:10',
            'direccion' => 'required|min:3'
            
        ];
    }
}
