<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saveProductoRequest extends FormRequest
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

            'nombre'=>'required',
            'descripcion'=>'required',
            'cantidad'=>'required',
            'codigo'=>'required',
            'precio'=>'required',
            

            'image'=>[
                $this->route('producto')?'nullable':'required', 
                'image'
            ], 
            'categoria_id'=>[
                'required'
            ],

        ];


    }
}
