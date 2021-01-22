<?php

namespace App\Http\Controllers;

use App\Models\TrabajadorSocial;
use Illuminate\Http\Request;

class TrabajadorSocialController extends Controller
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trabajador_social = new TrabajadorSocial();
        $trabajador_social->fill($request->all())->save();
        return response()->json(
            ['message'=>'Trabajador social creado satisfactoriamente', 'data'=>$trabajador_social]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrabajadorSocial  $trabajadorSocial
     * @return \Illuminate\Http\Response
     */
    public function show(TrabajadorSocial $trabajadorSocial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrabajadorSocial  $trabajadorSocial
     * @return \Illuminate\Http\Response
     */
    public function edit(TrabajadorSocial $trabajadorSocial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrabajadorSocial  $trabajadorSocial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrabajadorSocial $trabajadorSocial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrabajadorSocial  $trabajadorSocial
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrabajadorSocial $trabajadorSocial)
    {
        //
    }
}
