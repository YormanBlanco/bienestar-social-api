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
            'relacion_familiar'=> 'required|string', 
            'relacion_academica' => 'required|string', 
            'tiempo_libre'=> 'required|string', 
            'actividades_extra_academicas' => 'required', 
            'cuales_actividades_extra_academicas'=> 'nullable|string', 
            'destino_beca'=> 'required|string', 
            'observaciones_generales'=> 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
        ];
    }

    public function attributes()
    {
        return [
            'relacion_familiar' => 'relación familiar',
            'relacion_academica' => 'relación académica',
            'tiempo_libre' => 'tiempo libre', 
            'actividades_extra_academicas'=> 'actividades extra-académicas', 
            'destino_beca'=> 'detino de beca', 
        ];
    }
}
