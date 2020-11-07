<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\Models\Estudiante;

class Family extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'family';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'estudiante_id','lastnames', 'names', 'sex', 'edad', 'parentesco', 'nivel_instruccion', 'profecion_oficio',  'ingreso_mensual',  'aporte_to_family', 
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
