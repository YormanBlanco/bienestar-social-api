<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\EstudianteRequest;
use App\Constants\General;

use Barryvdh\DomPDF\Facade as PDF;

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
        $estudiante = Estudiante::where('id', $id)->get();
        //return view('admin.estudiante.show', compact('estudiante'));
        $pdf = PDF::loadView('admin.estudiante.pdf', compact('estudiante'));
        $name = $estudiante[0]->names . $estudiante[0]->lastnames . $estudiante[0]->cedula;
        return view('admin.estudiante.pdf');
        return $pdf->download($name.'.pdf');
    }


    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $birth_date = $estudiante->birth_date;
        $birth_date = date('Y-m-d', strtotime($birth_date));
        return view(
            'admin.estudiante.edit', 
            [              
                'id'=>$id,
                'estudiante'=>$estudiante,
                'birth_date'=>$birth_date,
            ]
        );
    }


    public function update(EstudianteRequest $request, $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->fill($request->all())->save();
        $estudiante->birth_date = date('Y-m-d', strtotime($request->birth_date));
        return redirect('estudiante')->with('edit', '¡Estudiante actualizado satisfactoriamente!');
    }


    public function destroy($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();
        return redirect('estudiante')->with('delete', '¡Estudiante eliminado satisfactoriamente!');
    }
}
