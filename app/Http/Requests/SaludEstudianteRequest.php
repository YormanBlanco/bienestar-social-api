<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaludEstudianteRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            //estudiante
            'enfermedad'=> 'required', 
            'cual_enfermedad' => 'nullable', 
            'tratamiento_medico'=> 'required', 
            'cual_tratamiento_medico' => 'nullable', 
            'dificultad_aprendizaje'=> 'required', 
            'atencion_psicologica'=> 'required', 
            'atencion_neurologica'=> 'required',  
            'problemas_lenguaje'=> 'required',  
            'discapacidad'=> 'required', 
            'cual_discapacidad' => 'nullable',
            'protesis'=> 'required', 
            'cual_protesis' => 'nullable', 
            'consume_alcohol'=> 'required', 
            'frecuencia_consume_alcohol' => 'nullable', 
            'consume_drogas'=> 'required', 
            'fuma'=> 'required', 
            //familiares
            'cancer'=> 'required', 
            'diabetes'=> 'required', 
            'vih_sida'=> 'required', 
            'asma'=> 'required', 
            'hepatitis' => 'required', 
            'hipertension' => 'required', 
            'epilepsia' => 'required', 
            'tuberculosis' => 'required', 
            'retardo_mental' => 'required',  
            'esquizofrenia' => 'required', 
            'enfermedades_neurologicas' => 'required', 
            'artritis' => 'required', 
            'familiar_discapacidad' => 'required', 
            'tipo_familiar_discapacidad' => 'nullable',
        ];
    }
}
