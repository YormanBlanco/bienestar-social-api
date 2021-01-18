<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ViviendaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            //ubicacion
            'ubicacion' => 'required|string',
            'zona_urbana' => 'required', 
            'zona_urbana_tipo'=> 'nullable', 
            'zona_rural' => 'required', 
            'zona_rural_tipo'=> 'nullable', 
            'zona_industrial' => 'required', 
            'zona_industrial_tipo'=> 'nullable', 
            'tipo_vivienda' => 'required',  
            'tenencia_vivienda' => 'required', 
            'construccion' => 'required',
            //condiciones_alojamiento
            'habitaciones'=> 'required|string', 
            'cocina'=> 'required', 
            'comedor'=> 'required', 
            'sala'=> 'required', 
            'salacomedor'=> 'required', 
            'baño'=> 'required', 
            'patio'=> 'required', 
            'total_ambientes'=> 'required|string', 
            //eseneres de la vivienda
            'juego_de_sala' => 'required', 
            'juego_de_comedor' => 'required', 
            'camas' => 'required', 
            'ventiladores' => 'required', 
            'neveras' => 'required', 
                /*'cocina' => 'required',*/ 
            'televisor' => 'required',  
            'microondas' => 'required', 
            'computadora' => 'required', 
            'radio_equipo' => 'required', 
            'lavadora' => 'required', 
            'secadora' => 'required',
            'calentador' => 'required', 
            'licuadora' => 'required', 
            'extractor_jugo' => 'required', 
            'cafetera' => 'required', 
            'celular' => 'required', 
            'aire_acondicionado' => 'required',
            //servicios de la comunidad
            'abastos'=> 'required', 
            'bodegas'=> 'required', 
            'farmacias'=> 'required', 
            'escuelas'=> 'required', 
            'liceos'=> 'required', 
            'centros_salud'=> 'required',
            'modulos'=> 'required',  
            'cancha'=> 'required', 
            'parque'=> 'required', 
            //servicios publicos
            'electricidad' => 'required' , 
            'aguas_blancas' => 'required' , 
            'aguas_servidas' => 'required' , 
            'gas_tuberia' => 'required' , 
            'gas_bombona' => 'required' , 
            'recoleccion_desechos' => 'required' , 
            'telefonia' => 'required' ,  
            'transporte_propio' => 'required' , 
            'transporte_publico' => 'required' , 

            
        ];
    }
}
