<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\EstudianteRequest;
use App\Constants\General;

class EstudianteController extends Controller
{

    public function index(Request $request)
    {
        if($request->get('search')){ //si hay uja busqueda
            $search = $request->get('search');
            $estudiantes = Estudiante::select(
                'id','names','lastnames','cedula_tipo','cedula','birth_date as age','sex','created_at as created'
            )
                ->orWhere('names', 'LIKE', "%$search%")
                ->orWhere('lastnames', 'LIKE', "%$search%")
                ->orWhere('cedula', 'LIKE', "%$search%")
                ->orWhere( DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y')") , $search)
                ->orderBy('created_at', 'DESC')
                ->orderBy('names', 'ASC')
                ->orderBy('lastnames', 'ASC')
                ->paginate(General::PAGINATION_ITEMS);
    
            foreach($estudiantes as $estudiante){
                $birth_date = date("Y-m-d", strtotime($estudiante->age));
                $birth_date = Carbon::createFromDate($birth_date)->age;
                $estudiante->age = $birth_date;
                $created = date("d-m-Y", strtotime($estudiante->created));
                $estudiante->created = $created;
            }
    
            return view('admin.estudiante.index', compact('estudiantes'));
        }
        else{
            $estudiantes = Estudiante::select(
                'id','names','lastnames','cedula_tipo','cedula','birth_date as age','sex', 'created_at as created'
            )
                ->orderBy('created_at', 'DESC')
                ->orderBy('names', 'ASC')
                ->orderBy('lastnames', 'ASC')
                ->paginate(General::PAGINATION_ITEMS);
    
            foreach($estudiantes as $estudiante){
                $birth_date = date("Y-m-d", strtotime($estudiante->age));
                $birth_date = Carbon::createFromDate($birth_date)->age;
                $estudiante->age = $birth_date;
                $created = date("d-m-Y", strtotime($estudiante->created));
                $estudiante->created = $created;
            }
            return view('admin.estudiante.index', compact('estudiantes'));
        }
        
        
    }

    public function create()
    {
        return view('admin.estudiante.create');
    }

    public function store(EstudianteRequest $request)
    {
        $estudiante = new Estudiante();
        $estudiante->fill($request->except('birth_date', 'cedula', 'cedula_tipo', 'movil_phone', 'other_phone'));
        $estudiante->birth_date = date('Y-m-d', strtotime($request->birth_date));
        $estudiante->cedula_tipo = $request->cedula_tipo;
        $estudiante->cedula = $request->cedula;
        if($request->movil_phone){
            $estudiante->movil_phone = $request->movil_phone_code . '-' . $request->movil_phone;
        }
        if($request->other_phone){
            $estudiante->other_phone = $request->other_phone_code . '-' . $request->other_phone;
        }
        
        $estudiante->save();

        return redirect('family/create')->with('message', '¡Estudiante creado satisfactoriamente!');
    }


    public function show($id)
    {
        $estudiante = Estudiante::find($id);
        return view('admin.estudiante.show', compact('estudiante'));
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
