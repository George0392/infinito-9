<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateObd2Request extends FormRequest
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


    public function rules()
    {
        return [
            //validar campos antes de guardar en BD.
            'codigo'        =>'required|string|max:50|unique:obd2s,codigo,' . $this->Obd2,
            'descripcion' =>'nullable|string|max:550',
        ];
    }

    public function messages()
    {
        return[
            'codigo.unique'        =>'El nombre ya se encuentra registrado',
            'codigo.required'      =>'El valor del campo NOMBRE es obligatorio ',
            'codigo.string'        =>'El valor NOMBRE no es correcto',
            'codigo.max'           =>'El NOMBRE excede el limite de caracteres 50',
            'descripcion.string' =>'El valor DESCRIPCION no es correcto',
            'descripcion.max'    =>'El DESCRIPCION excede el limite de caracteres 550 ',
            ];
    }
}
