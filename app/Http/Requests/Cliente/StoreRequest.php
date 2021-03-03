<?php

namespace App\Http\Requests\Cliente;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'nombre'=>'string|required|max:250',
            'dni'=>'string|required|unique:clientes|max:10',
            'direccion'=>'nullable|string|max:250',
            'telefono'=>'nullable|string|max:15|unique:clientes',
            'email'=>'nullable|string|max:50|unique:clientes'
        ];
    }
    public function mensajes(){
        return[
            'nombre.required'=>'Este campo es requerido.',
            'nombre.string'=>'El valor no es correcto.',
            'nombre.max'=>'Solo se permite 250 caracteres máximo.',

            'dni.required'=>'Este campo es requerido.',
            'dni.string'=>'El valor no es correcto.',
            'dni.unique'=>'El cliente ya está registrado.',
            'dni.max'=>'Solo se permite 10 caracteres máximo.',

            'direccion.string'=>'El valor no es correcto.',
            'direccion.max'=>'Solo se permite 250 caracteres.',

            'telefono.int'=>'El valor no es correcto.',
            'telefono.max'=>'Solo se permite 15 caracteres.',

            'email.string'=>'El valor no es correcto.',
            'email.max'=>'Solo se permite 50 caracteres.',

        ];
    }
}
