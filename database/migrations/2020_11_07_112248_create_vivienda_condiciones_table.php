<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViviendaCondicionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vivienda_condiciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vivienda_id')->unsigned();
            $table->foreign('vivienda_id')->references('id')->on('vivienda');

            $table->string('habitaciones');
            $table->integer('cocina')->comment('0: Si, 1: No');
            $table->integer('comedor')->comment('0: Si, 1: No');
            $table->integer('sala')->comment('0: Si, 1: No');
            $table->integer('salacomedor')->comment('0: Si, 1: No');
            $table->integer('baño')->comment('0: Si, 1: No');
            $table->integer('patio')->comment('0: Si, 1: No');
            $table->string('total_ambientes');

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
        Schema::dropIfExists('vivienda_condiciones');
    }
}
