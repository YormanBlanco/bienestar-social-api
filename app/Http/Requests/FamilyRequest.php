<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamilyRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'lastnames' => 'required|string',
            'names' => 'required|string', 
            'sex'=> 'required|string', 
            'edad'=> 'required|string', 
            'parentesco'=> 'required|string', 
            'nivel_instruccion'=> 'required|string', 
            'profecion_oficio'=> 'required|string', 
            'ingreso_mensual'=> 'required', 
            'aporte_to_family'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            'lastnames.required' => 'El campo :attribute es obligatorio.',
            'names.required' => 'El campo :attribute es obligatorio.',
            'sex.required' => 'El campo :attribute es obligatorio.',
            'edad.required' => 'El campo :attribute es obligatorio.',
            'parentesco.required' => 'El campo :attribute es obligatorio.',
            'nivel_instruccion.required' => 'El campo :attribute es obligatorio.',
            'profecion_oficio.required' => 'El campo :attribute debe ser una dirección de email valida.',
            'ingreso_mensual.required' => 'El campo :attribute es obligatorio.',
            'aporte_to_family.required' => 'El campo :attribute es obligatorio.',
        ];
    }

    public function attributes()
    {
        return [
            'lastnames' => 'Apellidos',
            'names' => 'Nombres', 
            'sex'=> 'Sexo', 
            'edad'=> 'Edad', 
            'parentesco'=> 'Parentesco', 
            'nivel_instruccion'=> 'Nivel de instrucción', 
            'profecion_oficio'=> 'Profeción u oficio', 
            'ingreso_mensual'=> 'Ingreso mensual', 
            'aporte_to_family'=> 'Aporte a la familia',
        ];
    }
}
