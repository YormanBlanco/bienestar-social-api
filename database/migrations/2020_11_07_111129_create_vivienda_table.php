<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViviendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vivienda', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estudiante_id')->unsigned();
            $table->foreign('estudiante_id')->references('id')->on('estudiante');

            $table->string('ubicacion_vivienda');
            $table->integer('zona_urbana')->comment('0: Si, 1: No');
            $table->integer('tipo_zona_urbana')->comment('0: Urbanizacion, 1: Barrio, 2: Sector')->nullable();
            $table->integer('zona_rural')->comment('0: Si, 1: No');
            $table->integer('tipo_zona_rural')->comment('0: Caserio, 1: Finca, 2: Conuco, 3: Parcela')->nullable();
            $table->integer('zona_industrial')->comment('0: Si, 1: No');
            $table->integer('tipo_zona_industrial')->comment('0: Casa, 1: Galpon')->nullable();
            $table->integer('tipo_vivienda')->comment('0: Casa, 1: Quinta, 2: Apartamento, 3: Rancho');
            $table->integer('tenencia_vivienda')->comment('0: Propia, 1: Alquilada, 3: prestada');
            $table->integer('construccion')->comment('0: Paredes, 1: Techo, 3: Piso');

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
        Schema::dropIfExists('vivienda');
    }
}
