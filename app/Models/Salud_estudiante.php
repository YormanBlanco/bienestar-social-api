<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\Models\Estudiante;

class Salud_estudiante extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'salud_estudiante';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'estudiante_id','enfermedad', 'cual_enfermedad', 'tratamiento_medico', 'cual_tratamiento_medico', 'dificultad_aprendizaje', 'atencion_psicologica', 'atencion_neurologica',  'problemas_lenguaje',  'discapacidad', 'cual_discapacidad','protesis', 'cual_protesis', 'consume_alcohol', 'frecuencia_consume_alcohol', 'consume_drogas', 'fuma', 'cancer', 'diabetes', 'vih_sida', 'asma', 'hepatitis', 'hipertension', 'epilepsia', 'tuberculosis', 'retardo_mental',  'esquizofrenia', 'enfermedades_neurologicas', 'artritis', 'familiar_discapacidad', 'tipo_familiar_discapacidad',  
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
