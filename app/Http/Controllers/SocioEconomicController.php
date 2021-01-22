<?php

namespace App\Http\Controllers;

use App\Models\SocioEconomic;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\Estudiante;
use App\Models\Family;
use App\Http\Requests\SocioEconomicRequest;
use App\Constants\General;

class SocioEconomicController extends Controller
{

    public function index()
    {
        return $socioeconomic = SocioEconomic::with([
            'estudiante:id,lastnames,names,cedula',
            'family:id,estudiante_id,lastnames,names,parentesco'   
        ])           
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function create(){
        return $estudiantes = Estudiante::select('id','names','lastnames','cedula')
            ->orderBy('id','DESC')->get();
    }

    public function getFamilyByEstudianteId($estudiante_id){
        $estudiante = Estudiante::with([
            'family:id,lastnames,names,parentesco,aporte_to_family,ingreso_mensual,estudiante_id'
            ])
            ->select('id','names','lastnames', 'cedula','cedula_tipo') 
            ->where('id',$estudiante_id)
            ->get();

        $estudiante = $estudiante[0];
        $msg = '¡Núcleo familiar creado satisfactoriamente!';
        return view('admin.family.socioeconomic.create', compact('estudiante'));
    }

    public function store(SocioEconomicRequest $request)
    {
        $socioeconomic = new SocioEconomic();
        $socioeconomic->fill($request->all())->save();
        return redirect('egresos/create')->with('message', 'Estudio socio-económico creado satisfactoriamente');
    }


    public function show($id)
    {
        return SocioEconomic::with([
            'estudiante:id,lastnames,names,cedula',
            'family:id,estudiante_id,lastnames,names,parentesco'   
        ])     
            ->where('id',$id)      
            ->get();
    }


    public function edit($id)
    {
        return SocioEconomic::with([
            'estudiante:id,lastnames,names,cedula',
            'family:id,estudiante_id,lastnames,names,parentesco'   
        ])     
            ->where('id',$id)      
            ->get();
    }

    public function update(SocioEconomicRequest $request, $idc)
    {
        $socioeconomic = SocioEconomic::findOrFail($id);
        $socioeconomic->fill($request->all())->save();
        return response()->json(
            ['message'=>'Estudio socio-económico actualizado satisfactoriamente', 'data'=>$socioeconomic]);
    }

    public function destroy($idc)
    {
        $socioeconomic = SocioEconomic::findOrFail($id);
        $socioeconomic->delete();
        return response()->json(
            ['message'=>'Estudio socio-económico eliminado satisfactoriamente']);
    }
}
