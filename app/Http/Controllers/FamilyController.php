<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\Estudiante;
use App\Http\Requests\FamilyRequest;
use App\Constants\General;

class FamilyController extends Controller
{

    public function index()
    {
        /*return $family = Family::with([
            'estudiante'
        ])           
            ->orderBy('id', 'DESC')
            ->get(); */
        return $family = Estudiante::with([
            'family:id,lastnames,names,parentesco,aporte_to_family,ingreso_mensual,estudiante_id'
        ])
            ->select('id','names','lastnames')   
            ->orderBy('id', 'DESC')
            ->get();

    }

    public function create(){
        $estudiante = Estudiante::select('id','names','lastnames','cedula','cedula_tipo')
            ->orderBy('created_at','DESC')
            ->get()->first();

        return view('admin.family.create', compact('estudiante'));
    }

    public function store(FamilyRequest $request)
    {
        $family = new Family();
        $family->fill($request->all())->save();
        // return response()->json(
        //     ['message'=>'Familiar creado satisfactoriamente', 'data'=>$family]);

        return redirect('family/create')->with('msg', '¡Familiar creado satisfactoriamente!');
    }


    public function show($id)
    {
        return Family::find($id);
    }


    public function edit($id)
    {
        return Family::find($id);
    }


    public function update(FamilyRequest $request, $id)
    {
        $family = Family::find($id);
        $family->fill($request->all())->save();
        return response()->json(
            ['message'=>'Familiar actualizado satisfactoriamente', 'data'=>$family]);
    }

    public function destroy($id)
    {
        $family = Family::findOrFail($id);
        $family->delete();
        return response()->json(
            ['message'=>'Familiar eliminado satisfactoriamente']);
    }
}
