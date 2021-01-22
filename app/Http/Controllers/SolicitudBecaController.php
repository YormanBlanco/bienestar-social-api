<?php

namespace App\Http\Controllers;

use App\Models\SolicitudBeca;
use Illuminate\Http\Request;

class SolicitudBecaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
