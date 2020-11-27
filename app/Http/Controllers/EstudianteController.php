<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Requests\EstudianteRequest;
use App\Constants\General;

class EstudianteController extends Controller
{

    public function index()
    {
        $estudiantes = Estudiante::select(
            'id','names','lastnames','cedula','birth_date as age','sex'
        )->paginate(General::PAGINATION_ITEMS);

        foreach($estudiantes as $estudiante){
            $birth_date = date("Y-m-d", strtotime($estudiante->age));
            $birth_date = Carbon::createFromDate($birth_date)->age;
            $estudiante->age = $birth_date;
        }

        return view('admin.estudiante', compact('estudiantes'));
        
    }

    public function store(EstudianteRequest $request)
    {
        $estudiante = new Estudiante();
        $estudiante->birth_date = date('Y-m-d', strtotime($request->birth_date));
        $estudiante->fill($request->all())->save();
        return response()->json(
            ['message'=>'Estudiante creado satisfactoriamente', 'data'=>$estudiante]);
    }


    public function show($id)
    {
        $estudiante = Estudiante::find($id);
        return $estudiante;
    }


    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return $estudiante;
    }


    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->birth_date = date('Y-m-d', strtotime($request->birth_date));
        $estudiante->fill($request->all())->save();
        return response()->json(
            ['message'=>'Estudiante actualizado satisfactoriamente', 'data'=>$estudiante]);
    }


    public function destroy($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();
        return response()->json(
            ['message'=>'Estudiante eliminado satisfactoriamente']);
    }
}
