<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViviendaServiciosComunidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vivienda_servicios_comunidad', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vivienda_id')->unsigned();
            $table->foreign('vivienda_id')->references('id')->on('vivienda');

            $table->integer('abastos')->comment('0: Si, 1: No');
            $table->integer('bodegas')->comment('0: Si, 1: No');
            $table->integer('farmacias')->comment('0: Si, 1: No');
            $table->integer('escuelas')->comment('0: Si, 1: No');
            $table->integer('liceos')->comment('0: Si, 1: No');
            $table->integer('centros_salud')->comment('0: Si, 1: No');
            $table->integer('modulos')->comment('0: Si, 1: No');
            $table->integer('cancha')->comment('0: Si, 1: No');
            $table->integer('parque')->comment('0: Si, 1: No');

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
        Schema::dropIfExists('vivienda_servicios_comunidad');
    }
}
