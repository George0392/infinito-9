<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuariosRequest extends FormRequest
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
            //validar campos antes de guardar en BD.
            'name'     =>'required|string|min:3',
            'phone'    =>'required|string|min:11',
            'email'    =>'required|string|unique:users|email',
            'status'   => 'required|not_in:Elegir',
            'role'     => 'required|not_in:Elegir',
            'password' =>'required|min:6',
            'image'    =>'image|max:5120', //5mb max

        ];
    }

    public function messages()
    {
        return[
            'name.unique'       =>'El nombre ya se encuentra registrado',
            'name.required'     =>'El valor del campo nombre es obligatorio ',
            'name.string'       =>'El valor nombre no es correcto',
            'name.min'          =>'El nombre necesita minimo de 3 caracteres ',

            'phone.required'    =>'El valor del campo telefono es obligatorio ',
            'phone.string'      =>'El valor telefono no es correcto',
            'phone.min'         =>'El telefono necesita minimo de 12 caracteres ',

            'email.unique'      =>'El email ya se encuentra registrado',
            'email.required'    =>'El valor del campo email es obligatorio ',
            'email.string'      =>'El valor email no es correcto',
            'email.min'         =>'El email necesita minimo de 3 caracteres ',

            'status.required'   =>'El valor del campo status es obligatorio ',
            'status.not_in'     =>'El status no puede ser Elegir ',

            'role.required'     =>'El valor del campo role es obligatorio ',
            'role.not_in'       =>'El role no puede ser Elegir ',

            'password.required' =>'El valor del campo password es obligatorio ',
            'password.min'      =>'El password necesita minimo de 6 caracteres ',

            'image.image'      =>'El archivo no es una imagen',
            'image.image'      =>'El archivo es una imagen superior a 5 MB',


        ];
    }
}