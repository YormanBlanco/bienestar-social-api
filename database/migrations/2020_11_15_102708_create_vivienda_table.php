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

            //vivienda
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

            //vivienda_condiciones
            $table->string('habitaciones');
            $table->integer('cocina')->comment('0: Si, 1: No');
            $table->integer('comedor')->comment('0: Si, 1: No');
            $table->integer('sala')->comment('0: Si, 1: No');
            $table->integer('salacomedor')->comment('0: Si, 1: No');
            $table->integer('baño')->comment('0: Si, 1: No');
            $table->integer('patio')->comment('0: Si, 1: No');
            $table->string('total_ambientes');

            //vivienda_eseneres
            $table->integer('juego_de_sala')->comment('0: Si, 1: No');
            $table->integer('juego_de_comedor')->comment('0: Si, 1: No');
            $table->string('camas');
            $table->string('ventiladores');
            $table->string('neveras');
            //$table->string('cocina');
            $table->string('televisor');
            $table->integer('microondas')->comment('0: Si, 1: No');
            $table->integer('computadora')->comment('0: Si, 1: No');
            $table->integer('radio_equipo')->comment('0: Si, 1: No');
            $table->integer('lavadora')->comment('0: Si, 1: No');
            $table->integer('secadora')->comment('0: Si, 1: No');
            $table->integer('calentador')->comment('0: Si, 1: No');
            $table->integer('licuadora')->comment('0: Si, 1: No');
            $table->integer('extractor_jugo')->comment('0: Si, 1: No');
            $table->integer('cafetera')->comment('0: Si, 1: No');
            $table->integer('celular')->comment('0: Si, 1: No');
            $table->integer('aire_Acondicionado')->comment('0: Si, 1: No');

            //vivienda_servicios_publicos
            $table->integer('electricidad')->comment('0: Si, 1: No');
            $table->integer('aguas_blancas')->comment('0: Si, 1: No');
            $table->integer('aguas_servidas')->comment('0: Si, 1: No');
            $table->integer('gas_tuberia')->comment('0: Si, 1: No');
            $table->integer('gas_bombona')->comment('0: Si, 1: No');
            $table->integer('recoleccion_desechos')->comment('0: Si, 1: No');
            $table->integer('telefonia')->comment('0: Si, 1: No');
            $table->integer('transporte_propio')->comment('0: Si, 1: No');
            $table->integer('transporte_publico')->comment('0: Si, 1: No');

            //vivienda_servicios_comunidad
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
        Schema::dropIfExists('vivienda');
    }
}
