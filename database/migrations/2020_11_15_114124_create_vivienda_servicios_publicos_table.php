<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViviendaServiciosPublicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vivienda_servicios_publicos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vivienda_id')->unsigned();
            $table->foreign('vivienda_id')->references('id')->on('vivienda');

            $table->integer('electricidad')->comment('0: Si, 1: No');
            $table->integer('aguas_blancas')->comment('0: Si, 1: No');
            $table->integer('aguas_servidas')->comment('0: Si, 1: No');
            $table->integer('gas_tuberia')->comment('0: Si, 1: No');
            $table->integer('gas_bombona')->comment('0: Si, 1: No');
            $table->integer('recoleccion_desechos')->comment('0: Si, 1: No');
            $table->integer('telefonia')->comment('0: Si, 1: No');
            $table->integer('transporte_propio')->comment('0: Si, 1: No');
            $table->integer('transporte_publico')->comment('0: Si, 1: No');

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
        Schema::dropIfExists('vivienda_servicios_publicos');
    }
}
