<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\Estudiante;
use Illuminate\Http\Request;

use Carbon\Carbon;
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
            'family'
        ])
            ->select('id','names','lastnames')   
            ->orderBy('id', 'DESC')
            ->get();

    }

    public function store(FamilyRequest $request)
    {
        $family = new Family();
        $family->fill($request->all())->save();
        return response()->json(
            ['message'=>'Familiar creado satisfactoriamente', 'data'=>$family]);
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
        $family = new Family();
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
