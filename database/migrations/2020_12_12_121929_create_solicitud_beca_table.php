<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudBecaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_beca', function (Blueprint $table) {
            $table->increments('id'); //pk
            $table->uuid('uuid'); //uuid unico por solicitud
            $table->integer('status')
                ->default(0)
                ->comment('0: En revision, 1: Aprobada, 2: Rechazada');

            $table->integer('estudiante_id')->unsigned();
            $table->foreign('estudiante_id')->references('id')->on('estudiante');
            $table->integer('trabajador_social_id')->unsigned();
            $table->foreign('trabajador_social_id')->references('id')->on('trabajador_social');

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
        Schema::dropIfExists('solicitud_beca');
    }
}
