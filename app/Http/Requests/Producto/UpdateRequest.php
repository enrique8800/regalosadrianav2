<?php

namespace App\Http\Requests\Producto;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
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
// unique:productos,nombre|  |unique:productos,codigo
        return [
            'nombre'=>'string|required|unique:productos,nombre,'.$this->route('producto')->id,
            'descripcion'=>'nullable|string|max:250',
            'codigo' =>'required|string|unique:productos,codigo,'.$this->route('producto')->id,
            'precioVenta'=>'required',
        ];
    }

    public function withValidator(Validator $validator){
        
        $validator->after(function(Validator $validator){
            if($validator->errors()->count()!=0){
                return;
            // }else{
            //     dd($this);
        }
        });
    }

    public function mensajes(){
        return[
            'nombre.required'=>'Este campo es requerido.',
            'nombre.string'=>'El valor no es correcto.',
            'nombre.unique'=>'El producto ya está registrado.',
            'nombre.max'=>'Solo se permite 250 caracteres máximo.',

            'codigo.unique'=>'El producto ya está registrado.',

            'precioVenta.required'=>'Este campo es requerido.',

            'descripcion.string'=>'El valor no es correcto.',
            'descripcion.max'=>'Solo se permite 50 caracteres.',
        ];
    }
}
