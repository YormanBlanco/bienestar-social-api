<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EgresosRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'vivienda' => 'required',
            'vivienda_gasto' => 'nullable', 
            'transporte'=> 'required', 
            'tv_cable'=> 'required', 
            'alimentacion'=> 'required', 
            'salud'=> 'required', 
            'otros'=> 'required', 
            'educacion'=> 'required', 
            //'aporte_to_family'=> 'required',
            'recreacion'=> 'required',
            'telefono'=> 'required',
            'internet'=> 'required',
            'agua'=> 'required',
            'luz'=> 'required',
            'gas'=> 'required',
            //'total_egresos'=> 'required',
            //'total_ingresos'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            'vivienda.required' => 'El campo :attribute es obligatorio.',
            'transporte.required' => 'El campo :attribute es obligatorio.',
            'tv_cable.required' => 'El campo :attribute es obligatorio.',
            'alimentacion.required' => 'El campo :attribute es obligatorio.',
            'salud.required' => 'El campo :attribute es obligatorio.',
            'otros.required' => 'El campo :attribute debe ser una dirección de email valida.',
            'educacion.required' => 'El campo :attribute es obligatorio.',
            //'aporte_to_family.required' => 'El campo :attribute es obligatorio.',
            'recreacion.required' => 'El campo :attribute es obligatorio.',
            'telefono.required' => 'El campo :attribute es obligatorio.',
            'internet.required' => 'El campo :attribute es obligatorio.',
            'agua.required' => 'El campo :attribute es obligatorio.',
            'luz.required' => 'El campo :attribute es obligatorio.',
            'gas.required' => 'El campo :attribute es obligatorio.',
            //'total_egresos.required' => 'El campo :attribute es obligatorio.',
            //'total_ingresos.required' => 'El campo :attribute es obligatorio.',

        ];
    }

    public function attributes()
    {
        return [
            'vivienda.required' => 'Vivienda',
            'transporte.required' => 'transporte',
            'tv_cable.required' => 'televisión por cable',
            'alimentacion.required' => 'alimentación',
            'salud.required' => 'salud',
            'otros.required' => 'otros',
            'educacion.required' => 'educación',
            //'aporte_to_family.required' => 'aporte familiar',
            'recreacion.required' => 'recreacion',
            'telefono.required' => 'teléfono',
            'internet.required' => 'internet',
            'agua.required' => 'agua',
            'luz.required' => 'luz',
            'gas.required' => 'gas',
            //'total_egresos.required' => 'total egresos',
            //'total_ingresos.required' => 'total ingresos',
        ];
    }
}
