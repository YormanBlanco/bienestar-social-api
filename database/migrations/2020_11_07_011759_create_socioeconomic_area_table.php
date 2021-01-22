<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocioeconomicAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socioeconomic_area', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('estudiante_id')->unsigned();
            $table->foreign('estudiante_id')->references('id')->on('estudiante');
            $table->integer('family_id')->unsigned();
            $table->foreign('family_id')->references('id')->on('family');
            
            $table->float('monto_aporte');
            $table->integer('beca')->comment('0: Si, 1: No');
            $table->string('organismo_beca')->nullable();


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
        Schema::dropIfExists('socioeconomic_area');
    }
}
