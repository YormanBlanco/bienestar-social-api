<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocioFamiliarRequest extends FormRequest
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
            'relacion_familiar'=> 'nullable|string', 
            'relacion_academica' => 'nullable|string', 
            'tiempo_libre'=> 'nullable|string', 
            'actividades_extra_academicas' => 'required', 
            'cuales_actividades_extra_academicas'=> 'nullable|string', 
            'destino_beca'=> 'nullable|string', 
            'observaciones_generales'=> 'nullable|string',
        ];
    }
}
