<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\Models\SolicitudBeca;


class TrabajadorSocial extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'trabajador_social';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'lastnames', 'names', 'cedula', 'email', 'movil_phone', 'local_phone','other_phone', 'address', 
    ];

    protected $appends = [
        'date_es',
    ];

    public function getDateEsAttribute()
    {
        return Carbon::parse($this->created_at)->format('d-m-Y');
    }

    public function solicitud_beca()
    {
        return $this->hasMany(SolicitudBeca::class, 'trabajador_social_id', 'id');
    }
}
