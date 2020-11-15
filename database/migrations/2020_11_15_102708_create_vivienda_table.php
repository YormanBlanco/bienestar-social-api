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
            $table->string('ubicacion',250);
            $table->integer('zona_urbana')->comment('0: Si, 1: No');
            $table->integer('zona_urbana_tipo')->comment('0: Urbanización, 1: Barrio, 3: Sector')->nullable();
            $table->integer('zona_rural')->comment('0: Si, 1: No');
            $table->integer('zona_rural_tipo')->comment('0: Caserío, 1: Finca, 3: Conuco, 4: Parcela')->nullable();
            $table->integer('zona_industrial')->comment('0: Si, 1: No');
            $table->integer('zona_industrial_tipo')->comment('0: Casa, 1: Galpón')->nullable();
            $table->integer('tipo_vivienda')->comment('0: Casa, 1: Quinta, 3: Apartamento, 4: Rancho');
            $table->integer('tenencia_vivienda')->comment('0: Propia, 1: Alquilada, 3: Prestada');
            $table->integer('construccion')->comment('0: Paredes, 1: Techo, 3: Piso');

            $table->integer('estudiante_id')->unsigned();
            $table->foreign('estudiante_id')->references('id')->on('estudiante');
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
