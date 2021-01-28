<?php

namespace App\Http\Controllers;

use App\Models\SolicitudBeca;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Constants\General;

use Barryvdh\DomPDF\Facade as PDF;

class SolicitudBecaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->get('search')){ //si hay uja busqueda
            $search = $request->get('search');
            $solicitudes = SolicitudBeca::with([
                'estudiante:id,lastnames,names,cedula,cedula_tipo',
                'trabajador_social' => function($query){
                    $query->select('id','lastnames', 'names', 'cedula');
                }
            ])
                ->orWhere('status', 'LIKE', "%$search%")
                ->orWhere('uuid', 'LIKE', "%$search%")
                ->orderBy('created_at', 'DESC')
                ->paginate(General::PAGINATION_ITEMS);
    
            foreach($solicitudes as $solicitud){
                $created = date("d-m-Y", strtotime($solicitud->created_at));
                $solicitud->created = $created;
            }

            return view('admin.solicitud.index', compact('solicitudes'));
        }
        else{
            $solicitudes = SolicitudBeca::with([
                'estudiante:id,lastnames,names,cedula,cedula_tipo',
                'trabajador_social' => function($query){
                    $query->select('id','lastnames', 'names', 'cedula');
                }
            ])
                ->orderBy('created_at', 'DESC')
                ->paginate(General::PAGINATION_ITEMS);
    
            foreach($solicitudes as $solicitud){
                $created = date("d-m-Y", strtotime($solicitud->created_at));
                $solicitud->created = $created;
            }

            return view('admin.solicitud.index', compact('solicitudes'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $solicitud_beca = new SolicitudBeca();
        $solicitud_beca->fill($request->all())->save();
        return response()->json(
            ['message'=>'Solicitud de beca creado satisfactoriamente', 'data'=>$solicitud_beca]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SolicitudBeca  $solicitudBeca
     * @return \Illuminate\Http\Response
     */
    public function show(SolicitudBeca $solicitudBeca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SolicitudBeca  $solicitudBeca
     * @return \Illuminate\Http\Response
     */
    public function edit(SolicitudBeca $solicitudBeca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SolicitudBeca  $solicitudBeca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SolicitudBeca $solicitudBeca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SolicitudBeca  $solicitudBeca
     * @return \Illuminate\Http\Response
     */
    public function destroy(SolicitudBeca $solicitudBeca)
    {
        //
    }
}
