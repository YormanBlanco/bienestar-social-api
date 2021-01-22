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
        $estudiante = Estudiante::select('id','names','lastnames','cedula','cedula_tipo')
            ->orderBy('created_at','DESC')
            ->get()->first();

        $family = Family::select('id', 'names', 'lastnames', 'aporte_to_family', 'ingreso_mensual')
            ->where('estudiante_id', $estudiante->id)->get();
      
        $aporte_familiar = 0;
        $total_ingresos = 0;
        //return $family[0]->aporte_to_family;
        foreach ($family as $fa){
            $aporte_familiar = $aporte_familiar + $fa->aporte_to_family;
            $total_ingresos = $total_ingresos + $fa->ingreso_mensual;
        }

        $data = ['estudiante' => $estudiante, 
            'aporte_familiar'=>$aporte_familiar, 
            'total_ingresos'=>$total_ingresos
        ];

        return view('admin.family.egresos.create', compact('estudiante', 'aporte_familiar', 'total_ingresos'));
    }

    public function store(EgresosRequest $request)
    {
        $egresos = new Egresos();
        $egresos->fill($request->all())->save();
        
        return redirect('vivienda/create')->with('message', '¡Egresos registrados satisfactoriamente!');


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
