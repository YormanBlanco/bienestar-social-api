<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteRequest extends FormRequest
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
            'cedula'=> 'required|string', 
            'birth_date'=> 'required', 
            'place_birth'=> 'required|string', 
            'sex'=> 'required|string', 
            'email'=> 'email|nullable', 
            'twitter'=> 'string|nullable', 
            'movil_phone'=> 'string|nullable', 
            'local_phone'=> 'string|nullable',
            'other_phone'=> 'string|nullable', 
            'address_origin'=> 'required|string', 
            'live_residence'=> 'required', 
            'address_residence'=> 'nullable|string', 
            'residence_phone'=> 'nullable|string', 
            'admission_university'=> 'required', 
            'carrer_or_pnf'=> 'required|string', 
            'admission_period'=> 'required|string', 
            'semestre_trayecto'=> 'required|string', 
            'turn'=> 'required|string', 
            'change_carrer'=> 'required', 
            'cause_change'=> 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'lastnames.required' => 'El campo :attribute es obligatorio.',
            'names.required' => 'El campo :attribute es obligatorio.',
            'cedula.required' => 'El campo :attribute es obligatorio.',
            'birth_date.required' => 'El campo :attribute es obligatorio.',
            'place_birth.required' => 'El campo :attribute es obligatorio.',
            'sex.required' => 'El campo :attribute es obligatorio.',
            'email.email' => 'El campo :attribute debe ser una dirección de email valida.',
            'address_origin.required' => 'El campo :attribute es obligatorio.',
            'live_residence.required' => 'El campo :attribute es obligatorio.',
            'admission_university.required' => 'El campo :attribute es obligatorio.',
            'carrer_or_pnf.required' => 'El campo :attribute es obligatorio.',
            'admission_period.required' => 'El campo :attribute es obligatorio.',
            'semestre_trayecto.required' => 'El campo :attribute es obligatorio.',
            'turn.required' => 'El campo :attribute es obligatorio.',
            'change_carrer.required' => 'El campo :attribute es obligatorio.',
        ];
    }

    public function attributes()
    {
        return [
            'lastnames' => 'apellidos',
            'names' => 'nombres',
            'cedula'=> 'cédula', 
            'birth_date'=> 'fecha de nacimiento', 
            'place_birth'=> 'lugar de nacimiento', 
            'sex'=> 'sexo', 
            'email'=> 'email', 
            'address_origin'=> 'dirección de procedencia', 
            'live_residence'=> 'vive en residencia',   
            'admission_university'=> 'ingreso a la universidad', 
            'carrer_or_pnf'=> 'carrera o pnf', 
            'admission_period'=> 'periódo de ingreso', 
            'semestre_trayecto'=> 'semestre o trayecto', 
            'turn'=> 'turno', 
            'change_carrer'=> 'cambio de carrera', 
        ];
    }

}
