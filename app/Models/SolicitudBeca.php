<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\Models\TrabajadorSocial;
use App\Models\Estudiante;

class SolicitudBeca extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'solicitud_beca';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'uuid', 'status', 'estudiante_id', 'trabajador_social_id',
    ];

    protected $appends = [
        'date_es',
    ];

    public function getDateEsAttribute()
    {
        return Carbon::parse($this->created_at)->format('d-m-Y');
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'estudiante_id', 'id');
    }

    public function trabajador_social()
    {
        return $this->belongsTo(TrabajadorSocial::class, 'trabajador_social_id');
    }
}
