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
            'aporte_to_family'=> 'required',
            'recreacion'=> 'required',
            'telefono'=> 'required',
            'internet'=> 'required',
            'agua'=> 'required',
            'luz'=> 'required',
            'gas'=> 'required',
            'total_egresos'=> 'required',
            'total_ingresos'=> 'required',
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
            'vivienda' => 'Vivienda',
            'transporte' => 'transporte',
            'tv_cable' => 'televisión por cable',
            'alimentacion' => 'alimentación',
            'salud' => 'salud',
            'otros' => 'otros',
            'educacion' => 'educación',
            'aporte_to_family' => 'aporte familiar',
            'recreacion' => 'recreacion',
            'telefono' => 'teléfono',
            'internet' => 'internet',
            'agua' => 'agua',
            'luz' => 'luz',
            'gas' => 'gas',
            'total_egresos' => 'total egresos',
            'total_ingresos' => 'total ingresos',
        ];
    }
}
