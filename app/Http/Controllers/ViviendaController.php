<?php

namespace App\Http\Controllers;

use App\Models\Vivienda;
use App\Models\Estudiante;
use App\Models\Vivienda_condiciones;
use App\Models\Vivienda_eseneres;
use App\Models\Vivienda_servicios_comunidad;
use App\Models\Vivienda_servicios_publicos;
use Illuminate\Http\Request;
use App\Http\Requests\ViviendaRequest;
use App\Constants\General;
use Carbon\Carbon;

class ViviendaController extends Controller
{

    public function index()
    {
        return Vivienda::with([
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
        $vivienda = new Vivienda();
        $vivienda->fill($request->all())->save();
        return response()->json(
            ['message'=>'Vivienda registrada satisfactoriamente', 'data'=>$vivienda]);
    }

    public function show($id)
    {
        return Vivienda::with([
            'estudiante:id,lastnames,names,cedula'
        ])
            ->where('id', $id)
            ->get();
    }

    public function edit($id)
    {
        return Vivienda::with([
            'estudiante:id,lastnames,names,cedula'
        ])
            ->where('id', $id)
            ->get();
    }

    public function update(Request $request, $id)
    {
        $vivienda = Vivienda::findOrFail($id);
        $vivienda->fill($request->all())->save();
        return response()->json(
            ['message'=>'Vivienda actualizada satisfactoriamente', 'data'=>$vivienda]);
    }

    public function destroy($id)
    {
        $vivienda = Vivienda::findOrFail($id);
        $vivienda->delete();
        return response()->json(
            ['message'=>'Vivienda eliminada satisfactoriamente']);
    }
}
