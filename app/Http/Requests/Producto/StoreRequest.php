<?php

namespace App\Http\Requests\Producto;

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
            'nombre'=>'string|required|unique:productos|max:250',
            'descripcion'=>'nullable|string|max:250',

            'precioVenta'=>'required',


        ];
    }
    public function mensajes(){
        return[
            'nombre.required'=>'Este campo es requerido.',
            'nombre.string'=>'El valor no es correcto.',
            'nombre.unique'=>'El producto ya está registrado.',
            'nombre.max'=>'Solo se permite 250 caracteres máximo.',


            'precioVenta.required'=>'Este campo es requerido.',


            'descripcion.string'=>'El valor no es correcto.',
            'descripcion.max'=>'Solo se permite 50 caracteres.',
        ];
    }
}
