<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEgresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egresos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estudiante_id')->unsigned();
            $table->foreign('estudiante_id')->references('id')->on('estudiante');

            $table->integer('vivienda')->comment('0: Propia, 1: Alquilada');
            $table->float('vivienda_gasto')->nullable();
            $table->float('transporte');
            $table->float('tv_cable');
            $table->float('alimentacion');
            $table->float('salud');
            $table->float('otros');
            $table->float('educacion');
            $table->float('aporte_to_family'); //suma del aporte_to_family de todos los familiares del estudiante
            $table->float('recreacion');
            $table->float('telefono');
            $table->float('internet');
            $table->float('agua');
            $table->float('luz');
            $table->float('gas');
            $table->float('total_egresos');
            $table->float('total_ingresos'); //suma del ingreso_mensual de todos los familiares del estudiante

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
        Schema::dropIfExists('egresos');
    }
}
