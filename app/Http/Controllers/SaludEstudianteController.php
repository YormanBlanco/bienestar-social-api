<?php

namespace App\Http\Controllers;

use App\Models\Salud_estudiante;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\Http\Requests\SaludEstudianteRequest;
use App\Constants\General;
use Carbon\Carbon;

class SaludEstudianteController extends Controller
{

    public function index()
    {
        return Salud_estudiante::with([
            'estudiante:id,lastnames,names,cedula'
        ])->paginate(General::PAGINATION_ITEMS);
    }

    public function create()
    {
        $estudiante = Estudiante::select('id','names','lastnames','cedula','cedula_tipo')
            ->orderBy('created_at','DESC')
            ->get()->first();

        return view('admin.salud.create', compact('estudiante'));
    }

    public function store(Request $request)
    {
        $salud = new Salud_estudiante();
        $salud->fill($request->all())->save();
        return redirect('sociofamiliar/create')->with('message', 'Condiciones de salud registradas satisfactoriamente');
    }

    public function show($id)
    {
        return Salud_estudiante::with([
            'estudiante:id,lastnames,names,cedula'
        ])
            ->where('id', $id)
            ->get();
    }

    public function edit($id)
    {
        return Salud_estudiante::with([
            'estudiante:id,lastnames,names,cedula'
        ])
            ->where('id', $id)
            ->get();
    }

    public function update(Request $request, $id)
    {
        $salud = Salud_estudiante::findOrFail($id);
        $salud->fill($request->all())->save();
        return response()->json(
            ['message'=>'Condiciones de salud actualizadas satisfactoriamente', 'data'=>$salud]);
    }

    public function destroy($id)
    {
        $salud = Salud_estudiante::findOrFail($id);
        $salud->delete();
        return response()->json(
            ['message'=>'Condiciones de salud eliminadas satisfactoriamente']);
    }
}
