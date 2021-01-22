<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\Models\Estudiante;

class Vivienda extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'vivienda';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'estudiante_id','ubicacion', 'zona_urbana', 'zona_urbana_tipo', 'zona_rural', 'zona_rural_tipo', 'zona_industrial', 'zona_industrial_tipo',  'tipo_vivienda',  'tenencia_vivienda', 'construccion','habitaciones', 'cocina', 'comedor', 'sala', 'salacomedor', 'baño', 'patio', 'total_ambientes', 'abastos', 'bodegas', 'farmacias', 'escuelas', 'liceos', 'centros_salud', 'modulos',  'cancha', 'parque', 'electricidad', 'aguas_blancas', 'aguas_servidas', 'gas_tuberia', 'gas_bombona', 'recoleccion_desechos', 'telefonia',  'transporte_propio', 'transporte_publico', 'juego_de_sala', 'juego_de_comedor', 'camas', 'ventiladores', 'neveras', /*'cocina',*/ 'televisor',  'microondas', 'computadora', 'radio_equipo', 'lavadora', 'secadora', 'calentador', 'licuadora', 'extractor_jugo', 'cafetera', 'celular', 'aire_acondicionado', 
    ];

    protected $appends = [
        'date_es',
    ];

    public function getDateEsAttribute()
    {
        return Carbon::parse($this->created_at)->format('d-m-Y');
    }

    public function getCreatedAtAttribute($value)
    {
        if ($value != null) {
            return Carbon::parse($value)->format('d-m-Y H:i:s');
        }
    }

    public function getUpdatedAtAttribute($value)
    {
        if ($value != null) {
            return Carbon::parse($value)->format('d-m-Y H:i:s');
        }
    }

    public function getDeletedAtAttribute($value)
    {
        if ($value != null) {
            return Carbon::parse($value)->format('d-m-Y H:i:s');
        }
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'estudiante_id');
    }
}
