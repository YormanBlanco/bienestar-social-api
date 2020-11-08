<?php

namespace App\Http\Controllers;

use App\Models\Egresos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Family;
use App\Models\Estudiante;
use Carbon\Carbon;
use App\Http\Requests\EgresosRequest;
use App\Constants\General;

class EgresosController extends Controller
{

    public function index()
    {
        return Egresos::with([
            'estudiante:id,names,lastnames,cedula'
        ])->paginate(General::PAGINATION_ITEMS);
    }

    public function create(){
        return Estudiante::select('id','names','lastnames','cedula')
            ->orderBy('id','DESC')
            ->get();
    }

    public function store(EgresosRequest $request)
    {
        //suma aporte_to_family de los familaires
        $aporte_to_family = Family::select('aporte_to_family')->where('estudiante_id',$request->estudiante_id)->sum('aporte_to_family');

        //suma ingreso_mensual de los familiares
        $total_ingresos = Family::select('ingreso_mensual')->where('estudiante_id',$request->estudiante_id)->sum('ingreso_mensual');

        //suma de todos los egresos
        $total_egresos = collect($request->except('vivienda_gasto','estudiante_id','vivienda'))->sum();

        $egresos = new Egresos();
        $egresos->aporte_to_family = $aporte_to_family;
        $egresos->total_ingresos = $total_ingresos;
        $egresos->total_egresos = $total_egresos;
        $egresos->fill($request->all())->save();
        return response()->json(
            ['message'=>'Egresos registrados satisfactoriamente', 'data'=>$egresos]);
    }

    public function show($id)
    {
        return Egresos::with([
            'estudiante:id,names,lastnames,cedula'
        ])
            ->where('id', $id)
            ->get();
    }


    public function edit($id)
    {
        return Egresos::with([
            'estudiante:id,names,lastnames,cedula'
        ])
            ->where('id', $id)
            ->get();
    }

    public function update(EgresosRequest $request, $id)
    {
        //suma de todos los egresos
        foreach($request->except('estudiante_id','vivienda') as $value){
            if(is_numeric($value)){
                $collect[] = $value;
            }
        }
        $total_egresos = collect($collect)->sum();
        $egresos = Egresos::find($id);       
        $egresos->total_egresos = $total_egresos;
        $egresos->fill($request->all())->update();
        return response()->json(
            ['message'=>'Egresos actualizados satisfactoriamente', 'data'=>$egresos]);
    }

    public function destroy($id)
    {
        $egresos = Egresos::findOrFail($id);
        $egresos->delete();
        return response()->json(
            ['message'=>'Egresos eliminados satisfactoriamente']);
    }
}
