<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEgresosFamilyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egresos_family', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estudiante_id')->unsigned();
            $table->foreign('estudiante_id')->references('id')->on('estudiante');

            $table->integer('vivienda')->comment('0: Propia, 1: Alquilada');
            $table->float('vivienda_egreso')->nullable();
            $table->float('transporte')->nullable();
            $table->float('tv_cable')->nullable();
            $table->float('alimentacion')->nullable();
            $table->float('salud')->nullable();
            $table->float('otros')->nullable();
            $table->float('educacion')->nullable();
            $table->float('recreacion')->nullable();
            $table->float('telefono')->nullable();
            $table->float('internet')->nullable();
            $table->float('agua')->nullable();
            $table->float('luz')->nullable();
            $table->float('gas')->nullable();
            $table->float('total_egreso')->nullable();
            //Balance entre ingresos y egresos... ?
            $table->float('total_ingreso');
            $table->float('balance_ingreso_egreso'); //se resta del total_ingreso los egresos

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
        Schema::dropIfExists('egresos_family');
    }
}
