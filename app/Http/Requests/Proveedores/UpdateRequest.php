<?php

namespace App\Http\Requests\Proveedores;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'razon_social'=>'required|string|max:100',

            'calle'=>'nullable|string|max:250',
            'poblacion'=>'nullable|string|max:50',
            'cp'=>'nullable|string|max:5',
            'provincia'=>'nullable|string|max:50',
            'pais'=>'nullable|string|max:50',
            'telefono'=>'required|string|min:9|unique:providers,telefono,'. $this->route('provider')->id.'|max:9',
            'email'=>'required|email|string|unique:providers,email,'. $this->route('provider')->id.'|max:255',
            'fax'=>'nullable|string|max:50'
        ];
    }
    public function mensajes(){
        return[
            'razon_social.required'=>'Este campo es requerido.',
            'razon_social.string'=>'El valor no es correcto.',
            'razon_social.max'=>'Solo se permite 100 caracteres.',

            'calle.string'=>'El valor no es correcto.',
            'calle.max'=>'Solo se permite 250 caracteres.',

            'poblacion.string'=>'El valor no es correcto.',
            'poblacion.max'=>'Solo se permite 50 caracteres.',

            'cp.int'=>'El valor no es correcto.',
            'cp.max'=>'Solo se permite 5 caracteres.',

            'provincia.string'=>'El valor no es correcto.',
            'provincia.max'=>'Solo se permite 50 caracteres.',

            'pais.string'=>'El valor no es correcto.',
            'pais.max'=>'Solo se permite 50 caracteres.',

            'telefono.int'=>'El valor no es correcto.',
            'telefono.max'=>'Solo se permite 15 caracteres.',

            'email.string'=>'El valor no es correcto.',
            'email.max'=>'Solo se permite 50 caracteres.',

            'fax.int'=>'El valor no es correcto.',
            'fax.max'=>'Solo se permite 50 caracteres.',
        ];
    }
}
