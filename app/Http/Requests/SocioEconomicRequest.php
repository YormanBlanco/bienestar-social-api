<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocioEconomicRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [      
            'monto_aporte'=> 'required', 
            'beca'=> 'required',
            'organismo_beca'=> 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'monto_aporte.required' => 'El campo :attribute es obligatorio.',
            'beca.required' => 'El campo :attribute es obligatorio.',
        ];
    }

    public function attributes()
    {
        return [
            'monto_aporte' => 'Monto del aporte',
            'beca' => 'Beca', 
            'organismo_beca'=> 'Organismo que otorgó la beca', 
        ];
    }
}
