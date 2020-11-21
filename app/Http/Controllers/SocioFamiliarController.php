<?php

namespace App\Http\Controllers;

use App\Models\Socio_familiar;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\Http\Requests\SocioFamiliarRequest;
use App\Constants\General;
use Carbon\Carbon;

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
        return Estudiante::select('id','names','lastnames','cedula')
            ->orderBy('id','DESC')
            ->get();
    }

    public function store(Request $request)
    {
        $sf = new Socio_familiar();
        $sf->fill($request->all())->save();
        return response()->json(
            ['message'=>'Estudio socio-familiar registrado satisfactoriamente', 'data'=>$sf]);
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
