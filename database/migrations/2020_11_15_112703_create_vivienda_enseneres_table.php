<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViviendaEnseneresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vivienda_enseneres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vivienda_id')->unsigned();
            $table->foreign('vivienda_id')->references('id')->on('vivienda');

            $table->integer('juego_de_sala')->comment('0: Si, 1: No');
            $table->integer('juego_de_comedor')->comment('0: Si, 1: No');
            $table->string('camas');
            $table->string('ventiladores');
            $table->string('neveras');
            $table->string('cocina');
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
        Schema::dropIfExists('vivienda_enseneres');
    }
}
