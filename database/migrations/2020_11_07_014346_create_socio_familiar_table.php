<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocioFamiliarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socio_familiar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estudiante_id')->unsigned();
            $table->foreign('estudiante_id')->references('id')->on('estudiante');

            $table->longText('relacion_familiar')->nullable();
            $table->longText('relacion_academica')->nullable();
            $table->longText('tiempo_libre')->nullable();
            $table->integer('actividades_extra_academicas')->comment('0: Si, 1: No');
            $table->longText('cuales_actividades_extra_academicas')->nullable();
            $table->longText('destino_beca')->nullable();
            $table->longText('observaciones_generales')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socio_familiar');
    }
}
