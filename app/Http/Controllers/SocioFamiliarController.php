<?php

namespace App\Http\Controllers;

use App\Models\Socio_familiar;
use App\Models\Estudiante;
use App\Models\SolicitudBeca as Solicitud;
use App\Models\TrabajadorSocial as Trabajador;
use Illuminate\Http\Request;
use App\Http\Requests\SocioFamiliarRequest;
use App\Constants\General;
use Carbon\Carbon;
use Illuminate\Support\Str;

class SocioFamiliarController extends Controller
{
    
    public function index()
    {
        return Socio_familiar::with([
            'estudiante:id,lastnames,names,cedula'
        ])->paginate(General::PAGINATION_ITEMS);
    }

    public function create()
    {
        $estudiante = Estudiante::select('id','names','lastnames','cedula','cedula_tipo')
            ->orderBy('created_at','DESC')
            ->get()->first();

        return view('admin.sociofamiliar.create', compact('estudiante'));
    }

    public function store(SocioFamiliarRequest $request)
    {
        //guardo la data sociofamiliar
        $sf = new Socio_familiar();
        $sf->fill($request->all())->save();
        
        //por ahora obteniendo único trabajador social registrado desde el seeder
        $trabajador = Trabajador::latest('id')->pluck('id')->first();

        //genero el codigo
        $count = Solicitud::all()->count();
        $code = str_pad(1, 9, 0, STR_PAD_LEFT);
        if ($count > 0) {
            $code = str_pad($count + 1, 10, 0, STR_PAD_LEFT);
        }

        $solicitud = new Solicitud();
        $solicitud->uuid = $code;
        $solicitud->status = 0; //por defecto 0 = (en revisión)
        $solicitud->estudiante_id = $request->estudiante_id;
        $solicitud->trabajador_social_id = $trabajador;
        $solicitud->save();

        return redirect('solicitud')->with('message', '¡Solicitud de beca creada satisfactoriamente!');
    }

    public function show($id)
    {
        return Socio_familiar::with([
            'estudiante:id,lastnames,names,cedula'
        ])
            ->where('id', $id)
            ->get();
    }

    public function edit($id)
    {
        return Socio_familiar::with([
            'estudiante:id,lastnames,names,cedula'
        ])
            ->where('id', $id)
            ->get();
    }

    public function update(Request $request, $id)
    {
        $sf = Socio_familiar::findOrFail($id);
        $sf->fill($request->all())->save();
        return response()->json(
            ['message'=>'Estudio socio-familiar actualizado satisfactoriamente', 'data'=>$sf]);
    }

    public function destroy($id)
    {
        $sf = Socio_familiar::findOrFail($id);
        $sf->delete();
        return response()->json(
            ['message'=>'Estudio socio-familiar eliminado satisfactoriamente']);
    }
}
