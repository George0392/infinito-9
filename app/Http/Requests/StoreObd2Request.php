<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreObd2Request extends FormRequest
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
            'codigo'        =>'required|string|max:50|unique:obd2s',
            'descripcion' =>'nullable|string|max:550',
        ];
    }

    public function messages()
    {
        return[
            'codigo.unique'      =>'El CODIGO ya se encuentra registrado',
            'codigo.required'    =>'El valor del campo CODIGO es obligatorio ',
            'codigo.string'      =>'El valor CODIGO no es correcto',
            'codigo.max'         =>'El CODIGO excede el limite de caracteres 50',
            'descripcion.string' =>'El valor DESCRIPCION no es correcto',
            'descripcion.max'    =>'El DESCRIPCION excede el limite de caracteres 550 ',
        ];
    }
}